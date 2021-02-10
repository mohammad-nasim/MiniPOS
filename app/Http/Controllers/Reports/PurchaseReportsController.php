<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\PurchesItems;
use Illuminate\Http\Request;

class PurchaseReportsController extends Controller
{

    //viewPurchaseReports
    public function purchaseReports(Request $request){

        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date']  = $request->get('end_date', date('Y-m-d'));

        $this->data['purchasereports'] = PurchesItems::select('purches_items.*', 'purches_invoices.date', 'products.title')
        ->join('products', 'purches_items.product_id', '=', 'products.id')
        ->join('purches_invoices', 'purches_items.purches_invoice_id', '=', 'purches_invoices.id' )
        ->whereBetween('purches_invoices.date', [$this->data['start_date'], $this->data['end_date']]  )
        ->get();

        return view('reports.purchasereports', $this->data);
    }
}
