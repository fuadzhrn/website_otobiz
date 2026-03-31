document.addEventListener("DOMContentLoaded", () => {
    const animatedItems = document.querySelectorAll(".fade-up");
    const unitFilters = document.querySelectorAll(".produk-filter");
    const filterWrap = document.getElementById("produk-unit-filters");
    const unitCards = document.querySelectorAll(".produk-unit-card");
    const specSwitches = document.querySelectorAll(".produk-switch");
    const specSwitchWrap = document.getElementById("produk-spec-switch");
    const specName = document.getElementById("spec-name");
    const specList = document.getElementById("produk-spec-list");
    const galleryMain = document.getElementById("produk-gallery-main");
    const galleryThumbs = document.getElementById("produk-gallery-thumbs");
    const calcButton = document.getElementById("btn-hitung-simulasi");
    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    const centerOnSmallScreen = (el, wrap) => {
        if (!el || !wrap || window.innerWidth > 767) {
            return;
        }

        el.scrollIntoView({
            behavior: "smooth",
            inline: "center",
            block: "nearest"
        });
    };

    const specsData = {
        confero: {
            name: "Wuling Confero",
            specs: [
                ["Kategori", "Konvensional"],
                ["Jenis Energi", "Bensin"],
                ["Kapasitas Penumpang", "Family / operasional multi-penumpang"],
                ["Kegunaan Operasional", "Transportasi online dan B2B"],
                ["Keunggulan Utama", "Kabin lega, cocok untuk operasional, nilai kemitraan terjangkau"]
            ],
            images: [
                ["https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1400&q=80", "Wuling Confero tampak depan"],
                ["https://images.unsplash.com/photo-1549924231-f129b911e442?auto=format&fit=crop&w=1400&q=80", "Wuling Confero tampak samping"],
                ["https://images.unsplash.com/photo-1550355291-bbee04a92027?auto=format&fit=crop&w=1400&q=80", "Wuling Confero interior"]
            ]
        },
        vinfast: {
            name: "VinFast Limo Green",
            specs: [
                ["Kategori", "EV"],
                ["Jenis Energi", "Listrik"],
                ["Kapasitas Penumpang", "Operasional urban modern"],
                ["Kegunaan Operasional", "Transportasi online modern dan efisiensi mobilitas"],
                ["Keunggulan Utama", "Lebih efisien, modern, ramah lingkungan, cocok untuk tren kendaraan masa depan"]
            ],
            images: [
                ["https://images.unsplash.com/photo-1593941707882-a5bac6861d75?auto=format&fit=crop&w=1400&q=80", "VinFast Limo Green tampak depan"],
                ["https://images.unsplash.com/photo-1560958089-b8a1929cea89?auto=format&fit=crop&w=1400&q=80", "Kendaraan listrik tampak samping"],
                ["https://images.unsplash.com/photo-1592853625601-bb9d23da12fc?auto=format&fit=crop&w=1400&q=80", "Charging EV modern"]
            ]
        }
    };

    const updateSpecView = (key) => {
        const data = specsData[key];
        if (!data || !specName || !specList || !galleryMain || !galleryThumbs) {
            return;
        }

        specName.textContent = data.name;
        specList.innerHTML = data.specs
            .map((item) => {
                return '<div class="produk-specs-list__row"><dt>' + item[0] + '</dt><dd>' + item[1] + '</dd></div>';
            })
            .join("");

        galleryMain.src = data.images[0][0];
        galleryMain.alt = data.images[0][1];

        galleryThumbs.innerHTML = data.images
            .map((image, index) => {
                const activeClass = index === 0 ? " is-active" : "";
                return '<button type="button" class="produk-gallery__thumb' + activeClass + '" data-src="' + image[0] + '" data-alt="' + image[1] + '"><img src="' + image[0] + '" alt="' + image[1] + '"></button>';
            })
            .join("");

        bindGalleryThumbs();
    };

    const bindGalleryThumbs = () => {
        if (!galleryThumbs || !galleryMain) {
            return;
        }

        const thumbs = galleryThumbs.querySelectorAll(".produk-gallery__thumb");
        thumbs.forEach((thumb) => {
            thumb.addEventListener("click", () => {
                thumbs.forEach((item) => item.classList.remove("is-active"));
                thumb.classList.add("is-active");
                galleryMain.src = thumb.getAttribute("data-src") || "";
                galleryMain.alt = thumb.getAttribute("data-alt") || "Preview unit OTOBIZ";
            });
        });
    };

    unitFilters.forEach((button) => {
        button.addEventListener("click", () => {
            const filter = button.getAttribute("data-filter") || "all";

            unitFilters.forEach((item) => item.classList.remove("is-active"));
            button.classList.add("is-active");

            unitCards.forEach((card) => {
                const category = card.getAttribute("data-category") || "";
                const show = filter === "all" || category === filter;
                card.classList.toggle("is-hidden", !show);
            });

            centerOnSmallScreen(button, filterWrap);
        });
    });

    specSwitches.forEach((button) => {
        button.addEventListener("click", () => {
            specSwitches.forEach((item) => item.classList.remove("is-active"));
            button.classList.add("is-active");
            updateSpecView(button.getAttribute("data-unit") || "confero");
            centerOnSmallScreen(button, specSwitchWrap);
        });
    });

    const formatRupiah = (value) => {
        return "Rp " + value.toLocaleString("id-ID");
    };

    if (calcButton) {
        calcButton.addEventListener("click", () => {
            const setoran = Number((document.getElementById("setoran-harian") || {}).value || 0);
            const hari = Number((document.getElementById("hari-operasional") || {}).value || 0);
            const biayaOperasional = Number((document.getElementById("biaya-operasional") || {}).value || 0);
            const biayaCicilan = Number((document.getElementById("biaya-cicilan") || {}).value || 0);

            const totalOperasional = setoran * hari;
            const nettProfit = totalOperasional - biayaCicilan - biayaOperasional;
            const nettFinal = nettProfit < 0 ? 0 : nettProfit;
            const bagianMitra = Math.round(nettFinal * 0.6);
            const bagianOtobiz = Math.round(nettFinal * 0.4);

            const elTotal = document.getElementById("hasil-total-operasional");
            const elNett = document.getElementById("hasil-nett-profit");
            const elMitra = document.getElementById("hasil-bagian-mitra");
            const elOtobiz = document.getElementById("hasil-bagian-otobiz");

            if (elTotal) {
                elTotal.textContent = formatRupiah(totalOperasional);
            }
            if (elNett) {
                elNett.textContent = formatRupiah(nettFinal);
            }
            if (elMitra) {
                elMitra.textContent = formatRupiah(bagianMitra);
            }
            if (elOtobiz) {
                elOtobiz.textContent = formatRupiah(bagianOtobiz);
            }
        });
    }

    if (prefersReducedMotion) {
        animatedItems.forEach((item) => item.classList.add("is-visible"));
    } else {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: window.innerWidth <= 767 ? 0.1 : 0.18,
                rootMargin: window.innerWidth <= 767 ? "0px 0px -18px 0px" : "0px 0px -40px 0px"
            }
        );

        animatedItems.forEach((item) => observer.observe(item));
    }
    updateSpecView("confero");
});
