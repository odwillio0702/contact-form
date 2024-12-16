const elements = document.querySelectorAll('.fade-in');
window.addEventListener('scroll', () => {
    elements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight) {
            el.classList.add('visible');
        }
    });
});
emailjs.sendForm('service_i3eua68', 'template_42fad26', this)
  .then(function(response) {
    console.log('SUCCESS!', response);
  }, function(error) {
    console.log('FAILED...', error);
  });
