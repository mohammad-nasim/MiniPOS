<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SaleInvoiceRequest;
use App\Http\Requests\InvoiceReceiptRequest;
use App\Product;
use App\Receipt;
use App\SaleInvoice;
use App\SaleItems;
use Auth;
use Illuminate\Support\Facades\Session;


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


         return view('user.sales.sales', $this->data);

    }

    //newInvoiceCreate
    public function create(SaleInvoiceRequest $request , $user_id){

         $formData = $request->all();
         $formData['user_id'] = $user_id;
         $formData['admin_id'] = Auth::id();


         if(SaleInvoice::create($formData)){
            $last_data = SaleInvoice::latest()->first();
            //or// take variable of Model & call it's id to route

            return redirect()->route('user.sale.invoice.details', ['id' => $user_id, 'saleinvoice_id' =>$last_data] );
         }

    }

    //newInvoice
    public function invoices($user_id, $invoice_id){

    $this->data['invoice'] = SaleInvoice::findorfail($invoice_id);
    $this->data['show']    = User::find($user_id);
    $this->data['user']    = User::find($user_id);
    $this->data['product'] = Product::arrForSelect();



     //return $this->data['invoice']->admin;

        return view('user.sales.salesinvoice', $this->data);
    }

    //InvoiceDelelte
    public function invoiceDestroy($user_id, $invoicce_id){
        if(SaleInvoice::destroy($invoicce_id)){
            session::flash('message-danger', 'Sale Invoice Deleted Successfully');
            return redirect()->route('user.sale', ['id' => $user_id]);
        }
    }

    //Items:

    //Invoice's Item Add
    public function addItem(Request $request, $user_id, $invoice_id){
        $formData = $request->all();
        $formData['sale_invoice_id'] = $invoice_id;

        if(SaleItems::create($formData)){

            session::flash('message-success', 'Item Added Successfully');

            return redirect()->route('user.sale.invoice.details', ['id' => $user_id, 'saleinvoice_id' =>$invoice_id] );
         }
    }

    //Invoice's Receipt Add
    public function addReceipt(InvoiceReceiptRequest $request , $user_id, $invoice_id){

        return $request->all();
    }

    //Delete Invoice Items
    public function invoiceItemDestroy($user_id, $invoice_id, $item_id){
        if(SaleItems::destroy($item_id)){
            session::flash('message-danger', 'Sale Item Deleted Successfully');
            return redirect()->route('user.sale.invoice.details', ['id' => $user_id, 'saleinvoice_id' => $invoice_id]);
        }
    }









}
