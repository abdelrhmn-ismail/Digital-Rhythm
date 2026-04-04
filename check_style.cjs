const fs = require('fs');
const html = fs.readFileSync('resources/views/home.blade.php', 'utf8');

const matches = html.match(/style=\"[^\"]*\"/g);
if (matches) {
    const uniqueStyles = [...new Set(matches)];
    console.log(uniqueStyles.slice(0, 20).join('\n'));
}
