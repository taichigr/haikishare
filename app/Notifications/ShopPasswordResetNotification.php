<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

// コンビニ側パスワードリセット
class ShopPasswordResetNotification extends ResetPasswordNotification
{
    use Queueable;

    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
                    ->subject('パスワードリセットのお知らせ')
                    ->view('emails.shop.password_reset', [
                        'reset_url' => route('shop.password.reset',
                        [
                            'token' => $this->token,
                            'email' => $notifiable->getEmailForPasswordReset()
                        ])
                    ]);
    }
}
