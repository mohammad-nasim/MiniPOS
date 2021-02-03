<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\PurchesInvoice;
use App\Http\Requests\PurchaseInvoiceRequest;
use Auth;
use App\Product;
use App\PurchesItems;
use Illuminate\Support\Facades\Session;

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

        return view('user.purchase.purchase', $this->data);

    }

    //newInvoiceCreate
    public function create(PurchaseInvoiceRequest $request , $user_id){

        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        if($purchaseId = PurchesInvoice::create($formData)){
           //or// take variable of Model & call it's id to route

           return redirect()->route('user.purchase.invoice.details', ['id' => $user_id, 'purchaseinvoice_id' => $purchaseId->id] );
        }

   }

   //newInvoice
   public function invoices($user_id, $invoice_id){

   $this->data['invoice'] = PurchesInvoice::findorfail($invoice_id);
   $this->data['show']    = User::find($user_id);
   $this->data['user']    = User::find($user_id);
   $this->data['product'] = Product::arrForSelect();



    //return $this->data['invoice']->admin;

       return view('user.purchase.purchaseinvoice', $this->data);
   }

   //InvoiceDelelte
   public function invoiceDestroy($user_id, $invoicce_id){
       if(PurchesInvoice::destroy($invoicce_id)){
           session::flash('message-danger', 'Purchase Invoice Deleted Successfully');
           return redirect()->route('user.purchase', ['id' => $user_id]);
       }
   }

   //Items:

   //Invoice's Item Add
   public function addItem(Request $request, $user_id, $invoice_id){
       $formData = $request->all();
       $formData['purches_invoice_id'] = $invoice_id;

       if(PurchesItems::create($formData)){

           session::flash('message-success', 'Item Added Successfully');

           return redirect()->route('user.purchase.invoice.details', ['id' => $user_id, 'purchaseinvoice_id' =>$invoice_id] );
        }
   }

   //Invoice's Receipt Add
   public function addReceipt(InvoiceReceiptRequest $request , $user_id, $invoice_id){

       return $request->all();
   }

   //Delete Invoice Items
   public function invoiceItemDestroy($user_id, $invoice_id, $item_id){
       if(PurchesItems::destroy($item_id)){
           session::flash('message-danger', 'Purchase Item Deleted Successfully');
           return redirect()->route('user.purchase.invoice.details', ['id' => $user_id, 'purchaseinvoice_id' => $invoice_id]);
       }
   }











}
