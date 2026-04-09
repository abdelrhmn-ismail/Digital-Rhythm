<?php

namespace App\Services;

use App\Mail\ContactMessageAutoReply;
use App\Mail\ContactMessageReceived;
use App\Mail\ContactMessageReplyMail;
use App\Models\ContactMessage;
use App\Models\User;
use App\Repositories\ContactMessageRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactMessageService
{
    public function __construct(private readonly ContactMessageRepository $repository)
    {
    }

    public function list(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($filters, $perPage);
    }

    public function stats(): array
    {
        return [
            'total' => $this->repository->countAll(),
            'unread' => $this->repository->countUnread(),
        ];
    }

    public function store(array $data): ContactMessage
    {
        $message = DB::transaction(fn () => $this->repository->create($data));

        $this->notifyAdmin($message);
        $this->sendAutoReply($message);

        return $message;
    }

    public function markAsRead(ContactMessage $message): ContactMessage
    {
        return $this->repository->markAsRead($message);
    }

    public function markAsUnread(ContactMessage $message): ContactMessage
    {
        return $this->repository->markAsUnread($message);
    }

    public function delete(ContactMessage $message): void
    {
        $this->repository->delete($message);
    }

    public function reply(ContactMessage $message, array $data, ?User $user = null): ContactMessage
    {
        $payload = [
            'reply_subject' => $data['subject'],
            'reply_body' => $data['body'],
            'replied_at' => now(),
            'replied_by' => $user?->id,
            'is_read' => true,
        ];

        $updated = DB::transaction(fn () => $this->repository->update($message, $payload));

        Mail::to($updated->email)->send(new ContactMessageReplyMail($updated));

        return $updated;
    }

    public function export(array $filters = []): StreamedResponse
    {
        $filename = 'contact-messages-' . now()->format('Ymd_His') . '.csv';

        return response()->streamDownload(function () use ($filters) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Name', 'Email', 'Company', 'Phone', 'Budget', 'Message', 'Read', 'Received At']);

            foreach ($this->repository->allForExport($filters) as $message) {
                fputcsv($handle, [
                    $message->name,
                    $message->email,
                    $message->company,
                    $message->phone,
                    $message->budget,
                    preg_replace('/\s+/', ' ', trim($message->message)),
                    $message->is_read ? 'Yes' : 'No',
                    optional($message->created_at)->toDateTimeString(),
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }

    protected function notifyAdmin(ContactMessage $message): void
    {
        $recipient = config('mail.contact_recipient') ?? config('mail.from.address');

        if (! empty($recipient)) {
            Mail::to($recipient)->send(new ContactMessageReceived($message));
        }
    }

    protected function sendAutoReply(ContactMessage $message): void
    {
        if (! empty($message->email)) {
            Mail::to($message->email)->send(new ContactMessageAutoReply($message));
        }
    }
}
