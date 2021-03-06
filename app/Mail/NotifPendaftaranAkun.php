<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifPendaftaranAkun extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$email,$password)
    {
        $this->user = $user;
        $this->email = $email;
        $this->password = $password;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sites.register')
            ->with(['user' => $this->user,'password' => $this->password,'email' => $this->email]);
    }
}
