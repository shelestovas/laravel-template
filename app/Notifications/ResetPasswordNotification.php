<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class ResetPasswordNotification extends Notification
{
    use Queueable, SerializesModels;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $user;
    public $code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $code)
    {
        $this->user = $user;
        $this->code = $code;

        $this->subject('Сброс пароля');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //return (new MailMessage)->view('mail.auth.reset_password_link', ['token' => $this->token]);
        return (new MailMessage)
            ->subject('Сброс пароля')
            ->markdown('mail.auth.reset_password_link', ['url' => route('password.reset', $this->code)]);
            //->greeting('Сброс пароля')
            //->line('Перейдите по ссылке ниже чтобы установить новый пароль для аккаунта.')
            //->action('Перейти к сбросу пароля', route('password.reset', $this->token, false))
            //->line('Если произошла ошибка, просто проигнорируйте это письмо, и ничего не произойдёт.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
