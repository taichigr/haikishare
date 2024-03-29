<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyPurchaseUser extends Mailable
{
    use Queueable, SerializesModels;

    public $product;

    public function __construct($product)
    {
        //
        $this->product = $product;
    }

    // 購入メール（ユーザー）中身
    public function build()
    {

        return $this->subject('購入通知')
                    ->view('emails.user.notify_purchase', ['product' => $this->product]);
    }
}
