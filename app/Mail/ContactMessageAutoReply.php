<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageAutoReply extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contactMessage)
    {
    }

    public function build(): self
    {
        return $this->subject(__('We received your message at :app', ['app' => config('app.name')]))
            ->view('emails.contact.auto-reply')
            ->with(['message' => $this->contactMessage]);
    }
}
