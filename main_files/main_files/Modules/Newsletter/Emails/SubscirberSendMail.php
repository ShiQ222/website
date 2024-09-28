<?php

namespace Modules\Newsletter\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscirberSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $mail_subject;
    public $mail_message;

    public function __construct($mail_subject, $mail_message)
    {
        $this->mail_subject = $mail_subject;
        $this->mail_message = $mail_message;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mail_subject)->view('newsletter::admin.subscriber_mail', ['mail_message' => $this->mail_message]);
    }
}
