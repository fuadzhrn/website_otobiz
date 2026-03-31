document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".site-header");
    const animatedItems = document.querySelectorAll(".fade-up");
    const selectionStepsContainer = document.querySelector("#selection-steps");
    const selectionSteps = document.querySelectorAll(".selection-step");
    const form = document.getElementById("gabung-registration-form");
    const successMessage = document.getElementById("gabung-success-message");
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
        const fadeObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-visible");
                        fadeObserver.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: window.innerWidth <= 767 ? 0.12 : 0.2,
                rootMargin: window.innerWidth <= 767 ? "0px 0px -20px 0px" : "0px 0px -40px 0px"
            }
        );

        animatedItems.forEach((item) => fadeObserver.observe(item));
    }

    if (selectionStepsContainer) {
        if (prefersReducedMotion) {
            selectionSteps.forEach((step) => {
                step.classList.add("is-visible");
            });
        } else {
            const stepObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) {
                            return;
                        }

                        const stepDelay = window.innerWidth <= 767 ? 120 : 160;

                        selectionSteps.forEach((step, index) => {
                            setTimeout(() => {
                                step.classList.add("is-visible");
                            }, index * stepDelay);
                        });

                        stepObserver.unobserve(entry.target);
                    });
                },
                {
                    threshold: window.innerWidth <= 767 ? 0.16 : 0.3
                }
            );

            stepObserver.observe(selectionStepsContainer);
        }
    }

    const scrollTargets = document.querySelectorAll(".js-scroll-to-form");
    scrollTargets.forEach((button) => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            const target = document.querySelector("#gabung-form");
            if (!target) {
                return;
            }

            const headerOffset = getAnchorOffset();
            const targetTop = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
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
        const wrapper = field.closest(".gabung-field");
        if (!wrapper) {
            return;
        }

        wrapper.classList.add("has-error");
        const errorEl = wrapper.querySelector(".gabung-error");
        if (errorEl) {
            errorEl.textContent = message;
        }
    };

    const clearFieldError = (field) => {
        const wrapper = field.closest(".gabung-field");
        if (!wrapper) {
            return;
        }

        wrapper.classList.remove("has-error");
        const errorEl = wrapper.querySelector(".gabung-error");
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

            const requiredFields = [
                "nama-lengkap",
                "nomor-whatsapp",
                "email",
                "kota",
                "pekerjaan",
                "minat-program",
                "budget-awal"
            ];

            let isFormValid = true;

            requiredFields.forEach((id) => {
                const field = document.getElementById(id);
                if (!field) {
                    return;
                }

                clearFieldError(field);

                if (!field.value.trim()) {
                    setFieldError(field, "Field ini wajib diisi.");
                    isFormValid = false;
                }
            });

            const emailField = document.getElementById("email");
            if (emailField && emailField.value.trim() && !isValidEmail(emailField.value.trim())) {
                setFieldError(emailField, "Format email belum valid.");
                isFormValid = false;
            }

            const phoneField = document.getElementById("nomor-whatsapp");
            if (phoneField && phoneField.value.trim() && !isValidWhatsapp(phoneField.value.trim())) {
                setFieldError(phoneField, "Nomor WhatsApp tidak valid.");
                isFormValid = false;
            }

            const checkbox = document.getElementById("persetujuan");
            const checkboxError = document.querySelector(".gabung-error--checkbox");
            if (checkboxError) {
                checkboxError.textContent = "";
            }

            if (!checkbox || !checkbox.checked) {
                if (checkboxError) {
                    checkboxError.textContent = "Anda perlu menyetujui pernyataan untuk melanjutkan.";
                }
                isFormValid = false;
            }

            if (!isFormValid) {
                const firstErrorField = form.querySelector(".gabung-field.has-error input, .gabung-field.has-error select, .gabung-field.has-error textarea");

                if (firstErrorField) {
                    firstErrorField.focus({ preventScroll: true });
                    firstErrorField.scrollIntoView({
                        behavior: "smooth",
                        block: "center"
                    });
                }

                return;
            }

            form.reset();
            if (successMessage) {
                successMessage.textContent = "Pendaftaran berhasil dikirim. Tim OTOBIZ akan segera menghubungi Anda untuk konsultasi awal.";
            }
        });
    }

    updateHeaderState();
    window.addEventListener("scroll", updateHeaderState, { passive: true });
});
