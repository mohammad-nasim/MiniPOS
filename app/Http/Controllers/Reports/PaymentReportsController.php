<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentReportsController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->data['main_menu'] = 'Reports';
        $this->data['sub_menu'] = 'Payment';
    }

    //viewPaymentReport
    public function paymentReports(Request $request){

        $this->data['start_date'] = $request->get('start_date', date('Y-m-d'));
        $this->data['end_date']   = $request->get('end_date', date('Y-m-d'));


         $this->data['paymentreports'] = Payment::whereBetween('payments.date', [$this->data['start_date'] , $this->data['end_date']] )
        ->get();

        if(count($this->data['paymentreports'])  < 1){
            session::flash('message-warning', 'No Purchase Report Created Today');
        }

        return view('reports.paymentreport', $this->data);
    }
}
