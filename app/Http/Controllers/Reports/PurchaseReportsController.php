<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\PurchesItems;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class PurchaseReportsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu']  = 'Purchase';
    }

    //viewPurchaseReports
    public function purchaseReports(Request $request){

        //return $formatted = $carbon->toFormattedDateString();

        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date']  = $request->get('end_date', date('Y-m-d'));


        $this->data['purchasereports'] = PurchesItems::select('purches_items.*', 'purches_invoices.date', 'products.title')
        ->join('products', 'purches_items.product_id', '=', 'products.id')
        ->join('purches_invoices', 'purches_items.purches_invoice_id', '=', 'purches_invoices.id' )
        ->whereBetween('purches_invoices.date', [$this->data['start_date'] , $this->data['end_date']] )
        ->get();

        // $this->data['start_date'] = $startDate->toFormattedDateString();
        // $this->data['end_date']   = $endDate->toFormattedDateString();

        if(count($this->data['purchasereports'])  < 1){
            session::flash('message-warning', 'No Purchase Report Created Today');
        }

        return view('reports.purchasereports', $this->data);
    }
}

