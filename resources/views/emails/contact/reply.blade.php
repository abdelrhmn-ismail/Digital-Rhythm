<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $message->reply_subject ?? __('Response from :app', ['app' => config('app.name')]) }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #111827;">
    {!! nl2br(e($message->reply_body)) !!}

    <p style="margin-top: 2rem; color: #6B7280;">{{ __('Sent by :app', ['app' => config('app.name')]) }}</p>
</body>
</html>
