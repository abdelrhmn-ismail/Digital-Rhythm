<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contactMessage)
    {
    }

    public function build(): self
    {
        return $this->subject(__('New contact inquiry from :name', ['name' => $this->contactMessage->name]))
            ->view('emails.contact.received')
            ->with(['message' => $this->contactMessage]);
    }
}
