<?php

namespace Tests\Feature;

use App\Mail\ContactMessageAutoReply;
use App\Mail\ContactMessageReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_contact_messages_and_sends_notifications(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'John Example',
            'email' => 'john@example.com',
            'company' => 'Example Inc',
            'phone' => '+123456789',
            'budget' => '$10k-$50k',
            'message' => str_repeat('Great project details. ', 2),
        ];

        $response = $this->post(route('contact.store'), $payload);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'john@example.com',
            'name' => 'John Example',
        ]);

        Mail::assertSent(ContactMessageReceived::class);
        Mail::assertSent(ContactMessageAutoReply::class);
    }
}
