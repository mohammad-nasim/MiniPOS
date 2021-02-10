<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\SaleItems;
use Illuminate\Http\Request;

class SaleReportsController extends Controller
{
    //viewSaleReports
    public function saleReports(Request $request){

        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date']  = $request->get('end_date', date('Y-m-d'));

        $this->data['salereports'] = SaleItems::select('sale_items.*', 'sale_invoices.date', 'products.title')
        ->join('products', 'sale_items.product_id', '=', 'products.id')
        ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id' )
        ->whereBetween('sale_invoices.date', [$this->data['start_date'], $this->data['end_date']]  )
        ->get();

        return view('reports.salereports', $this->data);
    }
}

//
// $
