(function () {
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('[data-contact-form]');
        if (!form) {
            return;
        }

        var submitButton = form.querySelector('[data-contact-submit]');
        var originalLabel = submitButton ? submitButton.textContent : 'Submit';

        form.addEventListener('submit', function () {
            if (!submitButton) {
                return;
            }
            submitButton.disabled = true;
            submitButton.classList.add('opacity-70');
            var submittingText = submitButton.getAttribute('data-submitting') || 'Sending...';
            submitButton.textContent = submittingText;
        });

        form.addEventListener('reset', function () {
            if (!submitButton) {
                return;
            }
            submitButton.disabled = false;
            submitButton.classList.remove('opacity-70');
            submitButton.textContent = originalLabel;
        });
    });
})();
