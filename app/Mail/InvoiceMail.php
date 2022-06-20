<?php

namespace App\Mail;

use App\Product;
use App\Invoice;
use App\SoldItem;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $invoice;
    public $sold_items;
    
    public function __construct($invoice_id)
    {
        $this->invoice = Invoice::find($invoice_id);

        $this->sold_items = SoldItem::join('products', 'sold_items.product_id', '=', 'products.id')
            ->select('products.name', 'products.sku', 'products.description', 'sold_items.quantity', 'sold_items.selling_price')
            ->where('sold_items.invoice_id', '=', $invoice_id)
            ->get();

        // dd($orders);
        // dd($invoice);
    }

    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from grocery shop')
                    ->view('mails.invoice_mail')->with('invoice', $this->invoice)->with('sold_items', $this->sold_items);
                    // ->view('mails.invoice_mail',compact('invoice', 'sold_items'));
        // return $this->view('view.mails.invoice_mail');
    }
}