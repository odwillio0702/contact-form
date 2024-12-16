const elements = document.querySelectorAll('.fade-in');
window.addEventListener('scroll', () => {
    elements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight) {
            el.classList.add('visible');
        }
    });
});
// Select the toggle button
const toggleButton = document.getElementById('theme-toggle');

// Check for saved theme in localStorage
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
    document.body.classList.add('dark-theme');
    toggleButton.textContent = 'Light Mode';
}

// Add click event listener to the button
toggleButton.addEventListener('click', () => {
    const isDark = document.body.classList.toggle('dark-theme');
    toggleButton.textContent = isDark ? 'Light Mode' : 'Dark Mode';

    // Save the theme preference
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
});
