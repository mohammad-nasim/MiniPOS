<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SaleItems;
use App\PurchesItems;
use App\Payment;
use App\Receipt;
use Illuminate\Support\Facades\DB;

class DayReportsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu']  = 'dayreports';
    }

    // , DB::raw('SUM(sale_items.quantity) as quantity , AVG(sale_items.price) as price , SUM(sale_items.total) as total')

    public function dayReports(Request $request){

        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date']   = $request->get('end_date', date('Y-m-d'));

        $this->data['salereports'] = SaleItems::select('products.title', DB::raw(' SUM(sale_items.quantity) as quantity, AVG(sale_items.price) as price, SUM(sale_items.total) as total')  )
                                                ->join('products', 'sale_items.product_id', '=', 'products.id')
                                                ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id' )
                                                ->whereBetween('sale_invoices.date', [$this->data['start_date'], $this->data['end_date']]  )
                                                ->groupBy('products.id')
                                                ->get();



        $this->data['purchasereports'] = PurchesItems::select('products.title',  DB::raw('SUM(purches_items.quantity) as quantity, AVG(purches_items.price) as price, SUM(purches_items.total) as total' ) )
                                                ->join('products', 'purches_items.product_id', '=', 'products.id')
                                                ->join('purches_invoices', 'purches_items.purches_invoice_id', '=', 'purches_invoices.id' )
                                                ->whereBetween('purches_invoices.date', [$this->data['start_date'] , $this->data['end_date']] )
                                                ->groupBy('products.id')
                                                ->get();

        $this->data['receiptreports'] = Receipt::whereBetween('receipts.date', [$this->data['start_date'] , $this->data['end_date']] )
                                                ->get();

         $this->data['paymentreports'] = Payment::whereBetween('payments.date', [$this->data['start_date'] , $this->data['end_date']] )
                                                ->get();



        return view('reports.dayreport', $this->data);
    }

}
