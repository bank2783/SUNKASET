<?php

namespace App\Http\Controllers;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\fontPath;
// use LaravelDaily\Invoices\Classes\InvoicePdf;
// use App\InvoicPdf\InvoicePdf\setFont;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\models\Sold_history;

use Illuminate\Http\Request;
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');

class InVoicController extends Controller
{

    public function ShowInvoice(){

        return view('Invoice.invoice');
    }

}
