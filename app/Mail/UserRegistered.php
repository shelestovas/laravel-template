<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $activation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $activation)
    {
        //
        $this->user = $user;
        $this->activation = $activation;

        $this->subject('Регистрация пользователя');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.auth.confirm_email');
    }

}
