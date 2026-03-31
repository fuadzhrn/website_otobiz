document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.js-delete-form');
    deleteForms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            const message = form.getAttribute('data-confirm') || 'Yakin ingin menghapus item ini?';
            if (!window.confirm(message)) {
                event.preventDefault();
            }
        });
    });

    const toggleButtons = document.querySelectorAll('.js-collapse-toggle');
    toggleButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const targetId = button.getAttribute('data-collapse-target');
            if (!targetId) {
                return;
            }

            const target = document.getElementById(targetId);
            if (!target) {
                return;
            }

            target.classList.toggle('is-collapsed');
        });
    });
});
