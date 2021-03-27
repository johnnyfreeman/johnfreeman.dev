<?php

namespace Tests\Feature;

use App\Mail\MessageCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    public function testSendsEmail()
    {
        // config()->set('honeypot.enabled', false);
        Mail::fake();

        $response = $this->post('contact', [
            'name' => 'Testy Testerson',
            'email' => 'fake@email.com',
            'message' => 'testing',
        ]);

        $response->assertViewIs('terminal');
        $response->assertViewHas('input', 'success');
        $response->assertViewHas('message', 'Message sent.');
        $response->assertOk();

        Mail::assertSent(MessageCreated::class, function ($mail) {
            return $mail->name == 'Testy Testerson'
                && $mail->email == 'fake@email.com';
        });
    }
}
