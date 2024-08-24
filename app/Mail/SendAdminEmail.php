<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Email; // Assuming Email model exists

class SendAdminEmail extends Mailable
{
    use Queueable, SerializesModels;
 
    
    public $subject;
    public $body;

    public function __construct(Email $email)
    {
        $this->subject = $email->subject;
        $this->body = $email->body;
    }


    public function build()
    {
        
        return $this->view('emails.sendadminemail')
                    ->subject($this->subject)
                    ->with([
                        'body' => $this->body,
                    ]);

    }


}
