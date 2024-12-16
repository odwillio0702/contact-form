const elements = document.querySelectorAll('.fade-in');
window.addEventListener('scroll', () => {
    elements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight) {
            el.classList.add('visible');
        }
    });
});
emailjs.init('nzxxs_Sm8ZRNAwEu9'); 