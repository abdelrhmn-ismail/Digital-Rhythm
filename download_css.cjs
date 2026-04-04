const fs = require('fs');
const https = require('https');

const cssLinks = [
    'https://goldenbee.sa/_next/static/chunks/a2463033d2a38f37.css',
    'https://goldenbee.sa/_next/static/chunks/acb33fd899f69e02.css'
];

async function downloadCss() {
    let combinedCss = '';
    
    for (const url of cssLinks) {
        await new Promise((resolve, reject) => {
            https.get(url, (res) => {
                let data = '';
                res.on('data', (chunk) => data += chunk);
                res.on('end', () => {
                    combinedCss += data + '\n';
                    resolve();
                });
            }).on('error', reject);
        });
    }

    // Replace ANY relative paths (like fonts or images) with absolute 
    combinedCss = combinedCss.replace(/url\(\/(?!\/)/g, 'url(https://goldenbee.sa/');
    
    fs.writeFileSync('public/css/goldenbee-core.css', combinedCss);
    console.log('Downloaded external CSS');
}

downloadCss();
