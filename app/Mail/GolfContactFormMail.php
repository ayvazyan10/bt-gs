<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GolfContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Form data (validated).
     *
     * @var array
     */
    public array $data;

    /**
     * Create a new message instance.
     *
     * @param  array  $data  Validated form payload (name, email, zeitraum, etc.)
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $name = trim($this->data['name'] ?? 'Neue Anfrage');

        return new Envelope(
            subject: 'Neue Termin-Anfrage' . ($name ? " — {$name}" : ''),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.golf',
            with: [
                'data' => $this->data,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
