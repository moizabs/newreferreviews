<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BussinessChatEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $info;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_info)
    {
        //
        $this->info = $user_info;
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
        return $this->from($email)
        ->subject(' Mail  Notification From Refer-Review')
        ->view('emails.business_chat_notification',compact('info'));
    }
}
