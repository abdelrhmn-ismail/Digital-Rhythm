<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contactMessage)
    {
    }

    public function build(): self
    {
        $subject = $this->contactMessage->reply_subject ?? __('Response from :app', ['app' => config('app.name')]);

        return $this->subject($subject)
            ->view('emails.contact.reply');
    }
}
