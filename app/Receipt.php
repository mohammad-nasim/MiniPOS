<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = ['user_id', 'admin_id', 'amount', 'note', 'date', 'sale_invoice_id'];

    //relationToAdmin
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    //relationToUsers
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relationToSaleInvoice
    public function SaleInvoice(){
        return $this->belongsTo(SaleInvoice::class);
    }


}

