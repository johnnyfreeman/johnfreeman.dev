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
        Mail::fake();

        $response = $this->post('contact', [
            'name' => 'Testy Testerson',
            'email' => 'fake@email.com',
            'message' => 'testing',
        ]);

        $response->assertViewIs('output.success');
        $response->assertOk();

        Mail::assertSent(MessageCreated::class, function ($mail) {
            return $mail->name == 'Testy Testerson'
                && $mail->email == 'fake@email.com';
        });
    }
}
