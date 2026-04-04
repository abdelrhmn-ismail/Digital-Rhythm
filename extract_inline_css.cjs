const fs = require('fs');
let html = fs.readFileSync('temp.html', 'utf8');

const styleTags = html.match(/<style[^>]*>([\s\S]*?)<\/style>/g);
let customCss = '';

if (styleTags) {
    for (const tag of styleTags) {
        const contentMatch = tag.match(/>([\s\S]*?)<\/style>/);
        if (contentMatch && contentMatch[1]) {
            customCss += contentMatch[1] + '\n\n';
        }
    }
}

if (customCss) {
    customCss = customCss.replace(/url\(\/(?!\/)/g, 'url(https://goldenbee.sa/');
    fs.appendFileSync('public/css/goldenbee-core.css', '\n/* INJECTED INLINE STYLES */\n' + customCss);
    console.log('Appended ' + styleTags.length + ' inline style tags to core CSS.');
} else {
    console.log('No <style> tags found ANYWHERE.');
}
