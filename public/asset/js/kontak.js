document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".site-header");
    const animatedItems = document.querySelectorAll(".fade-up");
    const scrollButtons = document.querySelectorAll(".js-kontak-scroll");
    const form = document.getElementById("kontak-form");
    const successMessage = document.getElementById("kontak-success");

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
            threshold: 0.2,
            rootMargin: "0px 0px -40px 0px"
        }
    );

    animatedItems.forEach((item) => observer.observe(item));

    scrollButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            const target = document.getElementById("contact-form");
            if (!target) {
                return;
            }

            const targetTop = target.getBoundingClientRect().top + window.pageYOffset - 120;
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

            const requiredIds = [
                "kontak-nama",
                "kontak-email",
                "kontak-whatsapp",
                "kontak-subjek",
                "kontak-jenis",
                "kontak-pesan"
            ];

            let valid = true;

            requiredIds.forEach((id) => {
                const field = document.getElementById(id);
                if (!field) {
                    return;
                }

                clearFieldError(field);

                if (!field.value.trim()) {
                    setFieldError(field, "Field ini wajib diisi.");
                    valid = false;
                }
            });

            const emailField = document.getElementById("kontak-email");
            if (emailField && emailField.value.trim() && !isValidEmail(emailField.value.trim())) {
                setFieldError(emailField, "Format email belum valid.");
                valid = false;
            }

            const phoneField = document.getElementById("kontak-whatsapp");
            if (phoneField && phoneField.value.trim() && !isValidWhatsapp(phoneField.value.trim())) {
                setFieldError(phoneField, "Nomor WhatsApp tidak valid.");
                valid = false;
            }

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
