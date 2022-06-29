<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\SoldItem;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class PDFController extends Controller
{
    //PDF GENERATE
    public function generateInvoicePDF($invoice_id)
    {
        $invoice = Invoice::find($invoice_id);

        $sold_items = SoldItem::join('products', 'sold_items.product_id', '=', 'products.id')
            ->select('products.name', 'products.sku', 'products.description', 'sold_items.quantity', 'sold_items.selling_price')
            ->where('sold_items.invoice_id', '=', $invoice_id)
            ->get();

        $date = date('m/d/Y');

        $pdf = PDF::loadView('/pdfs/invoice_pdf', compact('date', 'invoice', 'sold_items') );
        return $pdf->stream("Grocery Shop Invoice {$invoice->invoice_number}.pdf");
        // return view('/pdfs/invoice_pdf');
    }


    //PDF DOWNLOAD
    public function downloadInvoicePDF($invoice_id)
    {
        $invoice = Invoice::find($invoice_id);
 
        $sold_items = SoldItem::join('products', 'sold_items.product_id', '=', 'products.id')
            ->select('products.name', 'products.sku', 'products.description', 'sold_items.quantity', 'sold_items.selling_price')
            ->where('sold_items.invoice_id', '=', $invoice_id)
            ->get();

        $date = date('m/d/Y');
          
        $pdf = PDF::loadView('/pdfs/invoice_pdf', compact('date', 'invoice', 'sold_items') );
        return $pdf->download("Grocery Shop Invoice {$invoice->invoice_number}.pdf");
        // return view('/pdfs/invoice_pdf');
    }


    //PDF MAIL TO CUSTOMER
    public function mailInvoicePDF($invoice_id)
    {
        ////////////////////////////////
        //PDF CREATED, ATTACHED HERE AND SEND TO MAIL CLASS

        $invoice = Invoice::find($invoice_id);

        $sold_items = SoldItem::join('products', 'sold_items.product_id', '=', 'products.id')
            ->select('products.name', 'products.sku', 'products.description', 'sold_items.quantity', 'sold_items.selling_price')
            ->where('sold_items.invoice_id', '=', $invoice_id)
            ->get();

        $date = date('m/d/Y');

        $pdf = PDF::loadView('/pdfs/invoice_pdf', compact('date', 'invoice', 'sold_items') );

        $data['invoice'] = $invoice;
        $data['sold_items'] = $sold_items;
        $data['date'] = $date;
        
        Mail::send('mails.invoice_mail', $data, function($message)use($invoice , $pdf) {
            $message->to($invoice->customer_email)
            ->subject("INVOICE WITH PDF")
            ->attachData($pdf->output(), "Grocery Shop Invoice {$invoice->invoice_number}.pdf");
        });

        ////////////////////////////////



        ////////////////////////////////
        // SEND MAIL IN MAIL CLASS TO CREATE PDF THERE
        // Mail::to($invoice->customer_email)->send(new InvoiceMail($invoice->id)); 
        ////////////////////////////////

        return redirect('/invoices');
        // return redirect("/invoices/view/{$invoice_id}");
    }

    
    //PDF GENERATE
    public function generateProductPDF($product_id)
    {
        $product = Product::find($product_id);
        $date = date('m/d/Y');

        $pdf = PDF::loadView('/pdfs/product_pdf', compact('date', 'product') );
        return $pdf->stream("Grocery Shop Product {$product->sku}.pdf");
        // return view('/pdfs/product_pdf');
    }


    //PDF DOWNLOAD
    public function downloadProductPDF($product_id)
    {
        $product = Product::find($product_id);
        $date = date('m/d/Y');

        $pdf = PDF::loadView('/pdfs/product_pdf', compact('date', 'product') );
        return $pdf->download("Grocery Shop Product {$product->sku}.pdf");
        // return view('/pdfs/product_pdf');
    }


    //PDF MAIL TO CUSTOMER
    public function mailProductPDF($product_id)
    {
        $product = Product::find($product_id);
        $date = date('m/d/Y');

        $pdf = PDF::loadView('/pdfs/product_pdf', compact('date', 'product') );
        // return $pdf->download("Grocery Shop Product {$product->sku}.pdf");
        // return view('/pdfs/product_pdf');

        $data['product'] = $product;
        $data['date'] = $date;
        
        /////send to an admin !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        Mail::send('mails.product_mail', $data, function($message)use($product , $pdf) {
            // $message->to($invoice->customer_email) /////send to an admin email !!!!!!!!!!
            $message->to("admin@admin.com") /////demo !!!
            ->subject("PRODUCT WITH PDF")
            ->attachData($pdf->output(), "Grocery Shop Product {$product->sku}.pdf");
        });

        return redirect("/products/view/{$product_id}");

         /////send to an admin !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    }


}
