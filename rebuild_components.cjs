const fs = require('fs');

let main = fs.readFileSync('temp_main.html', 'utf8');

// Replace all NextJS image endpoints with absolute URLs to goldenbee.sa
main = main.replace(/\/_next\/image\?url=([^&"'\s]+)[^"'\s]*/g, (match, url) => {
    return 'https://goldenbee.sa' + decodeURIComponent(url);
});
main = main.replace(/src="\/uploads\//g, 'src="https://goldenbee.sa/uploads/');
main = main.replace(/src="\/images\//g, 'src="https://goldenbee.sa/images/');

// Safely convert Framer Motion inline styles to AOS
main = main.replace(/style="([^"]*)"/g, (match, styleContent) => {
    // If it doesn't have opacity:0, leave it alone
    if (!styleContent.includes('opacity:0') && !styleContent.includes('opacity: 0')) {
        return match;
    }
    
    let aos = 'fade-up';
    if (styleContent.includes('scale')) aos = 'zoom-in';
    
    // Remove opacity and transform completely from the style string
    let newStyle = styleContent
        .replace(/opacity:\s*0;?/g, '')
        .replace(/transform:[^;]*;?/g, '')
        .trim();
        
    // If the style is now empty, just return the AOS attribute
    if (newStyle === '') {
        return `data-aos="${aos}"`;
    }
    
    return `style="${newStyle}" data-aos="${aos}"`;
});

// Now split it into components
let heroStart = main.indexOf('<section class="relative min-h-screen');
let solutionsStart = main.indexOf('<section class="py-24 md:py-32');
let showcaseStart = main.indexOf('<section class="jsx-');
let whyStart = main.indexOf('<section class="py-24 md:py-40');
let spaceStart = main.indexOf('<div class="h-40"></div>');
let partnersStart = main.indexOf('<section class="py-24 relative overflow-hidden bg-black/50');
let endMain = main.indexOf('</main>');

const heroHtml = main.substring(heroStart, solutionsStart);
const solutionsHtml = main.substring(solutionsStart, showcaseStart);
const showcaseHtml = main.substring(showcaseStart, whyStart);
const whyHtml = main.substring(whyStart, spaceStart);
const partnersHtml = main.substring(spaceStart, endMain);

if (!fs.existsSync('resources/views/components/home')) {
    fs.mkdirSync('resources/views/components/home', { recursive: true });
}

fs.writeFileSync('resources/views/components/home/hero.blade.php', heroHtml);
fs.writeFileSync('resources/views/components/home/solutions.blade.php', solutionsHtml);
fs.writeFileSync('resources/views/components/home/showcase.blade.php', showcaseHtml);
fs.writeFileSync('resources/views/components/home/why-choose-us.blade.php', whyHtml);
fs.writeFileSync('resources/views/components/home/partners.blade.php', partnersHtml);

const newHome = `@extends('layouts.app')

@section('title', 'Golden Bee | Global Creative Agency')

@section('content')
<main class="flex-grow">
    <x-home.hero />
    <x-home.solutions />
    <x-home.showcase />
    <x-home.why-choose-us />
    <x-home.partners />
</main>
@endsection
`;
fs.writeFileSync('resources/views/home.blade.php', newHome);
console.log('Successfully rebuilt home components beautifully!');
