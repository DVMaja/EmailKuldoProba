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

    public function attachments(): array //$pdfName, $folderName
    {
        /* $pdfPathPath = storage_path('app/pathTarolo/pdf_pathData.json');
        if (file_exists($pdfPathPath)) {
            $pdfPathJson = file_get_contents($pdfPathPath);
            $pdfPath = json_decode($pdfPathJson);
        } */

        /* foreach ($pdfPath as $pdfPath) {
            $pdfAdatok = [
                'path' => $pdfPath->path,
                'year' => $pdfPath->year,
                'month' => $pdfPath->month,
            ];
        } */
        print($this->details['path']);
        $mappaPath = $this->details['path'];
        //pdfek/202301
        //$mappaPath = 'pdfek/202301';
        $pdfName = '00524.pdf';
        return [
            Attachment::fromPath('storage/' . $mappaPath . '/' . $pdfName)
                ->withMime('application/pdf'),
        ];
    }
}
