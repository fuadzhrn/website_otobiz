document.addEventListener("DOMContentLoaded", () => {
    const imageInputs = document.querySelectorAll(".js-image-input");
    const deleteForms = document.querySelectorAll(".js-confirm-delete");

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
            }
        });
    });
});
