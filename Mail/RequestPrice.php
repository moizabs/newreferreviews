<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestPrice extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // echo "<pre>";
        // print_r($this->details);
        // exit();
        $email = $this->details['email'];
        $name = $this->details['name'];
        return $this->from($email,$name)
        ->subject('Mail from Refer Reviews')->view('emails.request_price');
    }
}
