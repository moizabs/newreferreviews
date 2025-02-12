<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChatEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $info;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($buss_info)
    {
        //
        $this->info = $buss_info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info = $this->info;
        $email = $this->info['email'];
        $name = $this->info['name'];
        return $this->from($email)
        ->subject('Notification Mail From Refer-Review')
        ->view('emails.user_chat_notification',compact('info'));
    }
}
