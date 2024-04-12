<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminRegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $admin;
    public $verificationUrl;
    public $tempPassword;

    /**
     * Create a new message instance.
     *
     * @param  User  $admin
     * @param  array  $credentials
     * @return void
     */
    public function __construct($admin,$verificationUrl ,$tempPassword = "")
    {
        $this->admin = $admin;
        $this->verificationUrl = $verificationUrl;
        $this->tempPassword = $tempPassword;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admin Registration Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.email-verification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
