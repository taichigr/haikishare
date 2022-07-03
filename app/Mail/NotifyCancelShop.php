<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyCancelShop extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($product, $purchaser)
    {
        //
        $this->product = $product;
        $this->purchaser = $purchaser;
    }

    // キャンセルメール（コンビニ）
    public function build()
    {
        return $this->subject('キャンセル通知')
                    ->view('emails.shop.notify_cancel', ['product' => $this->product, 'purchaser' => $this->purchaser]);
    }
}