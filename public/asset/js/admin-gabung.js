document.addEventListener("DOMContentLoaded", () => {
    const deleteForms = document.querySelectorAll(".js-confirm-delete");
    const fieldTypeEls = document.querySelectorAll(".js-field-type");

    deleteForms.forEach((form) => {
        form.addEventListener("submit", (event) => {
            const message = form.getAttribute("data-confirm") || "Yakin ingin menghapus data ini?";
            if (!window.confirm(message)) {
                event.preventDefault();
            }
        });
    });

    const toggleOptionsHint = (selectEl) => {
        const wrapper = selectEl.closest("form");
        if (!wrapper) {
            return;
        }

        const optionsTextarea = wrapper.querySelector("textarea[name='options_json_text']");
        if (!optionsTextarea) {
            return;
        }

        const isSelect = selectEl.value === "select";
        optionsTextarea.placeholder = isSelect
            ? '[{"value":"ev","label":"EV"}]'
            : "Kosongkan untuk field non-select";
    };

    fieldTypeEls.forEach((selectEl) => {
        toggleOptionsHint(selectEl);
        selectEl.addEventListener("change", () => toggleOptionsHint(selectEl));
    });
});
