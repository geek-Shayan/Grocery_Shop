<?php

namespace App\Mail;

use PDF;
use App\Product;
use App\Invoice;
use App\SoldItem;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $product;

    public function __construct($product_id)
    {
        $this->product = Product::find($product_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from grocery shop')
                    ->view('mails.product_mail')
                    ->with('product', $this->product);
    }
}
