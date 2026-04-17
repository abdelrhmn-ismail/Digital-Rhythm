<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('We received your inquiry') }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #111827;">
    <p>{{ __('Hi :name,', ['name' => $contactMessage->name]) }}</p>
    <p>{{ __('Thank you for reaching out to :app. One of our strategists will review your project brief and respond shortly.', ['app' => config('app.name')]) }}</p>
    <p>{{ __('Here is a copy of your submission:') }}</p>
    <blockquote style="border-left: 4px solid var(--color-primary); margin: 1rem 0; padding-left: 1rem; color: #4B5563;">
        {{ $contactMessage->message }}
    </blockquote>
    <p>{{ __('If you need to share additional details, simply reply to this email.') }}</p>
    <p>{{ __('- The :app Team', ['app' => config('app.name')]) }}</p>
</body>
</html>



