<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Payment;
use App\Product;
use App\PurchesItems;
use App\Receipt;
use App\SaleItems;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['dashboard'] = 'dashboard';
    }

    public function index(){

        $this->data['main_menu'] = '';
        $this->data['sub_menu'] = '';

        $this->data['TotalUsers']     = User::count('id');
        $this->data['TotalProducts']  = Product::count('id');
        $this->data['TotalSales']     = SaleItems::sum('total');
        $this->data['TotalPurchases'] = PurchesItems::sum('total');
        $this->data['TotalPayment']   = Payment::sum('amount');
        $this->data['TotalReceipt']   = Receipt::sum('amount');
        $this->data['TotalStock']     = PurchesItems::sum('quantity') - SaleItems::sum('quantity') ;

        return view('welcome', $this->data);
    }
}
