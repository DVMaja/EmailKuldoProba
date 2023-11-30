<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TesztEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $details)//private string $name,
    {        
        $this->details = $details;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {        
        return $this->subject('Jövedelem kimutatás')//('subject' => $this->subject)
           ->view('mail.test-email');
        
            
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            //subject: [$this->$subject]
            //with: ['subject' => $this->subject]
            //with:['subject', $this->subject]

        );
    }

    /**
     * Get the message content definition.
     */
    /* public function content(): Content
    {
        return new Content(
            view: 'mail.test-email', //az első a mappa neve, a második blade neve lesz
            with: ['name' => $this->name]
        );
    }
 */


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $aktualisMappa = 'proba'; //ide kell valahogy majd megérkeznie a szükséges mappának
        $aktualisPdf = '/proba_pdf.pdf';
        return [
            Attachment::fromPath('storage/' . $aktualisMappa . $aktualisPdf)
                ->as('kuldendo.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
