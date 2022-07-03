<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyCancelUser extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($product)
    {
        //
        $this->product = $product;
    }

    // キャンセルメール（ユーザー）
    public function build()
    {
        return $this->subject('キャンセル通知')
                    ->view('emails.user.notify_cancel', ['product' => $this->product]);
    }
}
