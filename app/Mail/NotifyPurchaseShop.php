<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyPurchaseShop extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $purchaser;

    public function __construct($product, $purchaser)
    {
        //
        $this->product = $product;
        $this->purchaser = $purchaser;
    }

    // 購入メール（コンビニ）中身
    public function build()
    {
        return $this->subject('購入通知')
                    ->view('emails.shop.notify_purchase', ['product' => $this->product, 'purchaser' => $this->purchaser]);
    }
}
