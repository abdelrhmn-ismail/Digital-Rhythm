<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactMessageRequest;
use App\Services\ContactMessageService;
use Illuminate\Http\RedirectResponse;

class ContactMessageController extends Controller
{
    public function __construct(private readonly ContactMessageService $service)
    {
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return back()->with('success', __('Your inquiry has been submitted. Our strategists will contact you soon.'));
    }
}
