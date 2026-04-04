const fs = require('fs');
const html = fs.readFileSync('temp.html', 'utf8');

const headMatch = html.match(/<head[\s\S]*?<\/head>/);
if (headMatch) {
    const cssLinks = headMatch[0].match(/<link[^>]*rel=\"stylesheet\"[^>]*>/g);
    console.log('CSS Links:');
    console.log(cssLinks.join('\n'));
}
