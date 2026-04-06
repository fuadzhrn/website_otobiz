document.addEventListener("DOMContentLoaded", () => {
    const imageInputs = document.querySelectorAll(".js-image-input");
    const deleteForms = document.querySelectorAll(".js-confirm-delete");
    const allForms = document.querySelectorAll("form");
    const sectionCards = Array.from(document.querySelectorAll(".section-card"));
    const restoreKey = "adminProdukLastState";

    const detailsEls = Array.from(document.querySelectorAll("details"));
    detailsEls.forEach((details, index) => {
        details.dataset.restoreId = "details-" + index;
    });

    const saveRestoreState = (form) => {
        const section = form.closest(".section-card");
        const sectionIndex = sectionCards.indexOf(section);
        const sectionForms = section ? Array.from(section.querySelectorAll("form")) : [];
        const formIndex = sectionForms.indexOf(form);
        const openDetailIds = detailsEls
            .filter((details) => details.open)
            .map((details) => details.dataset.restoreId);

        const payload = {
            ts: Date.now(),
            sectionIndex,
            formIndex,
            openDetailIds,
        };

        window.sessionStorage.setItem(restoreKey, JSON.stringify(payload));
    };

    const restoreAfterReload = () => {
        const rawState = window.sessionStorage.getItem(restoreKey);
        if (!rawState) {
            return;
        }

        let state;
        try {
            state = JSON.parse(rawState);
        } catch (error) {
            window.sessionStorage.removeItem(restoreKey);
            return;
        }

        if (!state || !state.ts || Date.now() - state.ts > 5 * 60 * 1000) {
            window.sessionStorage.removeItem(restoreKey);
            return;
        }

        const openDetailSet = new Set(Array.isArray(state.openDetailIds) ? state.openDetailIds : []);
        detailsEls.forEach((details) => {
            if (openDetailSet.has(details.dataset.restoreId)) {
                details.open = true;
            }
        });

        const section = sectionCards[state.sectionIndex] || null;
        if (!section) {
            window.sessionStorage.removeItem(restoreKey);
            return;
        }

        const forms = Array.from(section.querySelectorAll("form"));
        const targetForm = forms[state.formIndex] || null;
        const targetEl = targetForm || section;

        window.requestAnimationFrame(() => {
            targetEl.scrollIntoView({
                behavior: "auto",
                block: "start",
            });
        });

        window.sessionStorage.removeItem(restoreKey);
    };

    restoreAfterReload();

    imageInputs.forEach((input) => {
        input.addEventListener("change", () => {
            const targetId = input.getAttribute("data-preview-target");
            const target = targetId ? document.getElementById(targetId) : null;
            const file = input.files && input.files[0] ? input.files[0] : null;

            if (!target || !file) {
                return;
            }

            target.src = URL.createObjectURL(file);
        });
    });

    deleteForms.forEach((form) => {
        form.addEventListener("submit", (event) => {
            const message = form.getAttribute("data-confirm") || "Yakin ingin menghapus data ini?";
            if (!window.confirm(message)) {
                event.preventDefault();
                return;
            }

            saveRestoreState(form);
        });
    });

    allForms.forEach((form) => {
        if (form.classList.contains("js-confirm-delete")) {
            return;
        }

        form.addEventListener("submit", () => {
            const action = form.getAttribute("action") || "";
            if (action.includes("/logout")) {
                return;
            }

            saveRestoreState(form);
        });
    });
});
