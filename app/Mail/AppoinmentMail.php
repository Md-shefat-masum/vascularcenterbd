<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppoinmentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $mail_view;
    public function __construct($mail_view)
    {
        $this->mail_view = $mail_view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@vascularcentrebd.com')
                ->view('email.email_body',[
                    'mail_view' => $this->mail_view,
                ]);
    }
}
