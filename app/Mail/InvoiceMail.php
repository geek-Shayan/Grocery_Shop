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

// class HasPdfAttachment extends Mailable implements ShouldQueue

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
    public $date;
    public $pdf;
    
    public function __construct($invoice_id)  //, $pdf
    {
        $this->invoice = Invoice::find($invoice_id);

        $this->sold_items = SoldItem::join('products', 'sold_items.product_id', '=', 'products.id')
            ->select('products.name', 'products.sku', 'products.description', 'sold_items.quantity', 'sold_items.selling_price')
            ->where('sold_items.invoice_id', '=', $invoice_id)
            ->get();

        // $this->pdf = base64_encode($pdf);
            

        // PDF CREATED HERE INSIDE MAIL CLASS 
        /////////////////////////////////////
        // $this->date = date('m/d/Y');
        
        // $this->pdf = PDF::loadView('/pdfs/invoice_pdf', [
        //     'date' => $this->date,
        //     'invoice' => $this->invoice,
        //     'sold_items' => $this->sold_items
        // ]);
        //////////////////////////////////////

    }

    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from grocery shop')
                    ->view('mails.invoice_mail')
                    ->with('invoice', $this->invoice)
                    ->with('sold_items', $this->sold_items);


                    // PDF ATTACHED HERE INSIDE MAIL CLASS 
                    ///////////////////////////////////
                    // ->attachData($this->pdf->output(), "Grocery Shop Invoice {$this->invoice->invoice_number}.pdf");
                    // ->attachData(base64_decode($this->pdf));
                    //////////////////////////////////

                    
                    // ->view('mails.invoice_mail',compact('invoice', 'sold_items'));
        // return $this->view('view.mails.invoice_mail');
    }
}
