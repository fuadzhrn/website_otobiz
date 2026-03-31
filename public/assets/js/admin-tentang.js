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
});
