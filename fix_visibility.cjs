const fs = require('fs');
let html = fs.readFileSync('resources/views/home.blade.php', 'utf8');

// Remove Framer Motion / inline opacity 0 styles and replace them with AOS animation attributes
html = html.replace(/ style="opacity:0;transform:translateY[^"]*"/g, ' data-aos="fade-up"');
html = html.replace(/ style="opacity:0;transform:scale[^"]*"/g, ' data-aos="zoom-in"');
html = html.replace(/ style="opacity:0[^"]*"/g, ' data-aos="fade-in"');

// Just in case there are still some left without the space
html = html.replace(/style="opacity:0[^\"]*"/g, '');

fs.writeFileSync('resources/views/home.blade.php', html);
console.log('Fixed visibility and added AOS animations');
