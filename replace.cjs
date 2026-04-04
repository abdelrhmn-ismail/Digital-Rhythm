const fs = require('fs');
let main = fs.readFileSync('temp_main.html', 'utf8');

// Replace all NextJS image endpoints with absolute URLs to goldenbee.sa
main = main.replace(/\/_next\/image\?url=([^&"'\s]+)[^"'\s]*/g, (match, url) => {
    return 'https://goldenbee.sa' + decodeURIComponent(url);
});
// Replace any relative /uploads/ or /images/ with absolute URLs if they missed the NextJS wrapper
main = main.replace(/src="\/uploads\//g, 'src="https://goldenbee.sa/uploads/');
main = main.replace(/src="\/images\//g, 'src="https://goldenbee.sa/images/');

let content = `
@extends('layouts.app')

@section('title', 'Golden Bee | Global Creative Agency')

@section('content')
${main}
@endsection
`;
fs.writeFileSync('resources/views/home.blade.php', content);
console.log('Successfully written home.blade.php with remote images!');
