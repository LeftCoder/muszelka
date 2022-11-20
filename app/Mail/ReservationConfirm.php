<?php

namespace App\Mail;

use App\Models\Reservation;
use App\Models\Token;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public $token;

    public $number;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation, Token $token, string $number)
    {
        $this->reservation = $reservation;
        $this->token = $token;
        $this->number = $number;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->reservation->email, "{$this->reservation->name} {$this->reservation->surname}"),
            subject: 'Muszelka - Przyjęliśmy Twoją rezerwację.',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.reservation_confirm',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
