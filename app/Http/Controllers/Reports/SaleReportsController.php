<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\SaleItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class SaleReportsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu']  = 'Sale';
    }

    //viewSaleReports
    public function saleReports(Request $request){

        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date']  = $request->get('end_date', date('Y-m-d'));

        $this->data['salereports'] = SaleItems::select('sale_items.*', 'sale_invoices.date', 'products.title')
        ->join('products', 'sale_items.product_id', '=', 'products.id')
        ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id' )
        ->whereBetween('sale_invoices.date', [$this->data['start_date'], $this->data['end_date']]  )
        ->get();

        if(count($this->data['salereports'])  < 1){
            session::flash('message-warning', 'No Sale Report Created Today');
        }

        return view('reports.salereports', $this->data);
    }
}

//
// $
