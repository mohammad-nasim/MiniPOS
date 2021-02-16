<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Payment;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Auth;
use Session;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

class UserPaymentController extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->data['tab_menu'] = "payment";
    }

    //paymentInvoiceShow
    public function index($id){
        $this->data['show'] = User::findorfail($id);
        $this->data['user'] = User::find($id);

        return view('user.payment.paymentinvoice', $this->data);
    }

    //paymentStore

    public function store(PaymentRequest $request, $user_id, $invoice_id = null){

        $formData             =  $request->all();
        $formData['user_id']  =  $user_id;
        $formData['admin_id'] =  Auth::id();

        if($invoice_id){
           $formData['purches_invoice_id'] = $invoice_id;
        }

        if(Payment::Create($formData)){

            if($invoice_id){
                return redirect()->route('user.purchase.invoice.details', ['id' => $user_id, 'purchaseinvoice_id' =>$invoice_id] );
            }

            session::flash('message-success', 'Payment Added Successfully');
            return redirect()->route('user.payment', ['id' => $user_id]);
        }
    }


    //paymentDestroy
    public function destroy($user_id, $payment_id){

        if(Payment::destroy($payment_id)){
            session::flash('message-danger', 'Payment Deleted Successfully');
            return redirect()->route('user.payment', ['id' => $user_id]);
        }
    }
}
