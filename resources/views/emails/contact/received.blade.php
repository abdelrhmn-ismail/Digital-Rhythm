<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('New Contact Inquiry') }}</title>
</head>
<body style="font-family: Arial, sans-serif; color: #111827;">
    <h2>{{ __('New Contact Inquiry') }}</h2>
    <p>{{ __('You have received a new contact form submission from :name.', ['name' => $contactMessage->name]) }}</p>

    <ul>
        <li><strong>{{ __('Name') }}:</strong> {{ $contactMessage->name }}</li>
        <li><strong>{{ __('Email') }}:</strong> {{ $contactMessage->email }}</li>
        <li><strong>{{ __('Company') }}:</strong> {{ $contactMessage->company ?? __('Not provided') }}</li>
        <li><strong>{{ __('Phone') }}:</strong> {{ $contactMessage->phone ?? __('Not provided') }}</li>
        <li><strong>{{ __('Budget') }}:</strong> {{ $contactMessage->budget ?? __('Not provided') }}</li>
    </ul>

    <p><strong>{{ __('Message') }}:</strong></p>
    <p>{{ $contactMessage->message }}</p>

    <p>{{ __('Manage this inquiry inside the admin panel for follow-up.') }}</p>
</body>
</html>



