<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\MagicToken;
# use Illuminate\Mail\Mailables\Address;

class MagicLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public MagicToken $magicToken;
    public string $randomStr;

    /**
     * Create a new message instance.
     */
    public function __construct(MagicToken $magicToken, string $randomStr)
    {
        $this->magicToken = $magicToken;
        $this->randomStr = $randomStr;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Magic Link Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.magic-link',
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
