<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('New Contact Inquiry') }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #111827;">
    <h2>{{ __('New Contact Inquiry') }}</h2>
    <p>{{ __('You have received a new contact form submission from :name.', ['name' => $message->name]) }}</p>

    <ul>
        <li><strong>{{ __('Name') }}:</strong> {{ $message->name }}</li>
        <li><strong>{{ __('Email') }}:</strong> {{ $message->email }}</li>
        <li><strong>{{ __('Company') }}:</strong> {{ $message->company ?? __('Not provided') }}</li>
        <li><strong>{{ __('Phone') }}:</strong> {{ $message->phone ?? __('Not provided') }}</li>
        <li><strong>{{ __('Budget') }}:</strong> {{ $message->budget ?? __('Not provided') }}</li>
    </ul>

    <p><strong>{{ __('Message') }}:</strong></p>
    <p>{{ $message->message }}</p>

    <p>{{ __('Manage this inquiry inside the admin panel for follow-up.') }}</p>
</body>
</html>
