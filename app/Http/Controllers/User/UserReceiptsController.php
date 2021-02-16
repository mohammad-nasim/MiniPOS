<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\ReceiptsRequest;
use App\Http\Controllers\Controller;
use App\Receipt;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;


class UserReceiptsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['tab_menu'] = "receipt";
    }

    //receiptsInvoiceShow
    public function index($id){
        $this->data['show'] = User::findorfail($id);
        $this->data['user'] = User::find($id);

        return view('user.receipts.receipts', $this->data);
    }

    //addnewReceipts
    public function store(ReceiptsRequest $request , $user_id, $invoice_id = null){

         $formData = $request->all();
         $formData['user_id'] = $user_id;
         $formData['admin_id'] =  Auth::id();

         if($invoice_id){
             $formData['sale_invoice_id'] = $invoice_id;
         }

         if(Receipt::Create($formData)){

            if($invoice_id){
                return redirect()->route('user.sale.invoice.details', ['id' => $user_id, 'saleinvoice_id' =>$invoice_id] );
            }
            else{
                session::flash('message-success', 'Receipts Added Successfully');
                return redirect()->route('user.receipts', ['id' => $user_id]);
            }

        }
    }

    //deleteReceipts
    public function destroy($user_id, $receipt_id){

        if(Receipt::destroy($receipt_id)){
            session::flash('message-danger', 'Receipts Deleted Successfully');
            return redirect()->route('user.receipts', ['id' => $user_id]);
        }
    }
}
