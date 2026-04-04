const fs = require('fs');
const raw = fs.readFileSync('resources/views/home.blade.php', 'utf8');

// Match sections based on distinct starting strings
let heroStart = raw.indexOf('<section class="relative min-h-screen');
let solutionsStart = raw.indexOf('<section class="py-24 md:py-32');
let showcaseStart = raw.indexOf('<section class="jsx-');
let whyStart = raw.indexOf('<section class="py-24 md:py-40');
let spaceStart = raw.indexOf('<div class="h-40"></div>');
let partnersStart = raw.indexOf('<section class="py-24 relative overflow-hidden bg-black/50');
let endMain = raw.indexOf('</main>');

const heroHtml = raw.substring(heroStart, solutionsStart);
const solutionsHtml = raw.substring(solutionsStart, showcaseStart);
const showcaseHtml = raw.substring(showcaseStart, whyStart);
const whyHtml = raw.substring(whyStart, spaceStart);
const partnersHtml = raw.substring(spaceStart, endMain);

// Create directory if not exists
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
console.log('Successfully structured home components!');
