<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = "sale";
    }

    //saleInvoiceShow
    public function index($id){
         $this->data['show']  = User::findorfail($id);
         $this->data['user']  = User::find($id);
         
         
         return view('user.sales.saleinvoice', $this->data);
        
    }
}
