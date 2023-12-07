<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TesztEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $details) //private string $name,
    {
        $this->details = $details;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Jövedelem kimutatás') //('subject' => $this->subject)
            ->view('mail.test-email');
    }

    public function envelope(): Envelope
    {
        return new Envelope();
    }

    /**
     * Get the message content definition.
     */
    /* public function content(): Content
    {
        return new Content(            
        );
    }
 */

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    /* public function attachments(): array
    {
        $aktualisMappa = 'proba'; //ide kell valahogy majd megérkeznie a szükséges mappának
        $aktualisPdf = '/proba_pdf.pdf';
        
        return [
            Attachment::fromPath('storage/' . $aktualisMappa . $aktualisPdf)
                //->as('kuldendo.pdf')
                ->withMime('application/pdf'),
        ];
    } */

    public function attachments($folderName, $pdfName): array
    {
        $mappaPath = 'app/' . $folderName . '/';

        return [
            Attachment::fromPath($mappaPath . $pdfName)
                ->withMime('application/pdf'),
        ];
    }
}
