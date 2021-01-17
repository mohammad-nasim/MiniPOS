<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserPurchaseController extends Controller
{
    
    public function __construct()
    {
        $this->data['tab_menu'] = "purchase";
    }

    //purchaseInvoiceShow
    public function index($id){
        $this->data['purchase'] = User::findorfail($id);
        $this->data['show'] = User::findorfail($id);
        $this->data['user'] = User::find($id);

        return view('user.purchase.purchaseinvoice', $this->data);

    }
}
