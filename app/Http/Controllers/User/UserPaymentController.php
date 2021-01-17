<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserPaymentController extends Controller
{
       
    public function __construct()
    {
        $this->data['tab_menu'] = "payment";
    }

    //paymentInvoiceShow
    public function index($id){
        $this->data['show'] = User::findorfail($id);
        $this->data['user'] = User::find($id);
        
        return view('user.payment.paymentinvoice', $this->data);
    }
}
