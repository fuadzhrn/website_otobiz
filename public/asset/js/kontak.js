document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".site-header");
    const animatedItems = document.querySelectorAll(".fade-up");
    const scrollButtons = document.querySelectorAll(".js-kontak-scroll");
    const form = document.getElementById("kontak-form");
    const successMessage = document.getElementById("kontak-success");
    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    const getAnchorOffset = () => {
        const headerHeight = header ? header.offsetHeight : 0;
        return headerHeight + (window.innerWidth <= 767 ? 14 : 18);
    };

    const updateHeaderState = () => {
        if (!header) {
            return;
        }

        if (window.scrollY > 20) {
            header.classList.add("is-scrolled");
        } else {
            header.classList.remove("is-scrolled");
        }
    };

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
                threshold: window.innerWidth <= 767 ? 0.12 : 0.2,
                rootMargin: window.innerWidth <= 767 ? "0px 0px -20px 0px" : "0px 0px -40px 0px"
            }
        );

        animatedItems.forEach((item) => observer.observe(item));
    }

    scrollButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            const target = document.getElementById("contact-form");
            if (!target) {
                return;
            }

            const targetTop = target.getBoundingClientRect().top + window.pageYOffset - getAnchorOffset();
            window.scrollTo({ top: targetTop, behavior: "smooth" });
        });
    });

    const isValidEmail = (value) => {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
    };

    const isValidWhatsapp = (value) => {
        const normalized = value.replace(/\s|-/g, "");
        return /^\+?\d{9,15}$/.test(normalized);
    };

    const setFieldError = (field, message) => {
        const wrapper = field.closest(".kontak-field");
        if (!wrapper) {
            return;
        }

        wrapper.classList.add("has-error");
        const errorEl = wrapper.querySelector(".kontak-error");
        if (errorEl) {
            errorEl.textContent = message;
        }
    };

    const clearFieldError = (field) => {
        const wrapper = field.closest(".kontak-field");
        if (!wrapper) {
            return;
        }

        wrapper.classList.remove("has-error");
        const errorEl = wrapper.querySelector(".kontak-error");
        if (errorEl) {
            errorEl.textContent = "";
        }
    };

    if (form) {
        form.addEventListener("submit", (event) => {
            event.preventDefault();

            if (successMessage) {
                successMessage.textContent = "";
            }

            const requiredFields = form.querySelectorAll(".kontak-field input[required], .kontak-field select[required], .kontak-field textarea[required]");

            let valid = true;

            requiredFields.forEach((field) => {
                clearFieldError(field);

                if (!field.value.trim()) {
                    setFieldError(field, "Field ini wajib diisi.");
                    valid = false;
                }
            });

            const customValidationFields = form.querySelectorAll(".kontak-field [data-validate]");
            customValidationFields.forEach((field) => {
                const value = field.value.trim();
                const type = field.getAttribute("data-validate");

                if (!value) {
                    return;
                }

                if (type === "email" && !isValidEmail(value)) {
                    setFieldError(field, "Format email belum valid.");
                    valid = false;
                }

                if (type === "whatsapp" && !isValidWhatsapp(value)) {
                    setFieldError(field, "Nomor WhatsApp tidak valid.");
                    valid = false;
                }
            });

            const checkbox = document.getElementById("kontak-persetujuan");
            const checkboxError = document.querySelector(".kontak-error--checkbox");
            if (checkboxError) {
                checkboxError.textContent = "";
            }

            if (!checkbox || !checkbox.checked) {
                if (checkboxError) {
                    checkboxError.textContent = "Anda perlu menyetujui pernyataan terlebih dahulu.";
                }
                valid = false;
            }

            if (!valid) {
                const firstErrorField = form.querySelector(".kontak-field.has-error input, .kontak-field.has-error select, .kontak-field.has-error textarea");

                if (firstErrorField) {
                    firstErrorField.focus({ preventScroll: true });
                    firstErrorField.scrollIntoView({ behavior: "smooth", block: "center" });
                }

                return;
            }

            form.reset();
            if (successMessage) {
                successMessage.textContent = "Pesan berhasil dikirim. Tim OTOBIZ akan menghubungi Anda sesegera mungkin.";
            }
        });
    }

    updateHeaderState();
    window.addEventListener("scroll", updateHeaderState, { passive: true });
});
