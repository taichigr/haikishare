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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $purchaser)
    {
        //
        $this->product = $product;
        $this->purchaser = $purchaser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('購入通知')
                    ->view('emails.shop.notify_purchase', ['product' => $this->product, 'purchaser' => $this->purchaser]);
    }
}
