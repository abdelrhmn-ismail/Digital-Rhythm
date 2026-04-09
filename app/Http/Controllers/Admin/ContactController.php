<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReplyContactMessageRequest;
use App\Models\ContactMessage;
use App\Services\ContactMessageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactController extends Controller
{
    public function __construct(private readonly ContactMessageService $service)
    {
    }

    public function index(Request $request): View
    {
        $filters = $request->only(['search', 'status', 'date']);
        $messages = $this->service->list($filters, 20);
        $stats = $this->service->stats();

        return view('admin.contacts.index', compact('messages', 'stats', 'filters'));
    }

    public function show(ContactMessage $contactMessage): View
    {
        $contact = $this->service->markAsRead($contactMessage);

        return view('admin.contacts.show', compact('contact'));
    }

    public function markRead(ContactMessage $contactMessage): RedirectResponse
    {
        $this->service->markAsRead($contactMessage);

        return back()->with('success', __('Message marked as read.'));
    }

    public function markUnread(ContactMessage $contactMessage): RedirectResponse
    {
        $this->service->markAsUnread($contactMessage);

        return back()->with('success', __('Message marked as unread.'));
    }

    public function reply(ReplyContactMessageRequest $request, ContactMessage $contactMessage): RedirectResponse
    {
        $this->service->reply($contactMessage, $request->validated(), $request->user());

        return back()->with('success', __('Reply sent successfully.'));
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $this->service->delete($contactMessage);

        return redirect()->route('admin.contacts.index')->with('success', __('Message removed.'));
    }

    public function export(Request $request): StreamedResponse
    {
        $filters = $request->only(['search', 'status', 'date']);

        return $this->service->export($filters);
    }
}
