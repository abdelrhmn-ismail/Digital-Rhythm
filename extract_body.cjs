const fs = require('fs');
const { JSDOM } = require('jsdom');

const html = fs.readFileSync('temp.html', 'utf8');
const dom = new JSDOM(html);
const body = dom.window.document.body;

fs.writeFileSync('temp_body.html', body.innerHTML);
console.log('Body extracted to temp_body.html');