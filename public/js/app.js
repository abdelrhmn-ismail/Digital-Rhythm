document.addEventListener('DOMContentLoaded', function() {
    // Initialize Animate On Scroll
    if (typeof AOS !== 'undefined') {
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });
    }

    // Additional global JavaScript can be added here
});
