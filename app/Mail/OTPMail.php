<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OTPMail extends Mailable
{
    use Queueable, SerializesModels;

    public $get_user_email;
    public $validToken;
    public $get_user_name;

    public $get_subject;

    public $get_view;

    // public $get_data;
    /**
     * Create a new message instance.
     */
    public function __construct($get_user_email, $validToken, $get_user_name, $get_subject, $get_view )
    {
        $this->get_user_email = $get_user_email;
        $this->validToken = $validToken;
        $this->get_user_name = $get_user_name;
        $this->get_subject = $get_subject;
        $this->get_view = $get_view;

        // $this->get_data = $get_data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->get_subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->get_view,
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
