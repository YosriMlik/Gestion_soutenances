<?php

namespace App\Mail;


use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class soutenanceEmail extends Mailable
{

    public $pfe;
    public $date;
    public $heure;
    public $salle;
    public $specialite;
    //use Queueable, SerializesModels;

    public function __construct($pfe, $date, $heure, $salle, $specialite){
        $this->pfe = $pfe;
        $this->date = $date;
        $this->heure = $heure;
        $this->salle = $salle;
        $this->specialite = $specialite;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Soutenance Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'home',
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
