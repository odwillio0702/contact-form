document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.contact-form');
    const submitButton = document.querySelector('.submit-btn');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        submitButton.disabled = true;
        submitButton.textContent = 'Sending...';

        setTimeout(() => {
            form.submit();
        }, 1000);
    });
});
