<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReceiptReportsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu']  = 'Receipt';
    }

    //viewReceiptReports
    public function receiptReports(Request $request){

        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date']   = $request->get('end_date', date('Y-m-d'));


         $this->data['receiptreports'] = Receipt::whereBetween('receipts.date', [$this->data['start_date'] , $this->data['end_date']] )
        ->get();

        if(count($this->data['receiptreports'])  < 1){
            session::flash('message-warning', 'No Receipt Report Created Today');
        }

        return view('reports.receiptreport', $this->data);
    }
}
