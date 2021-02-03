<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['date', 'amount', 'note', 'user_id', 'admin_id', 'purches_invoice_id'];

    //relationToAdmin
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function purches(){
        return $this->belongsTo(PurchesInvoice::class);
    }





}
