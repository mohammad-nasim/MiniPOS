<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['admin_id', 'group_id', 'name', 'email', 'phone','address'];

    public function group(){
        return $this->belongsTo(UserGroup::class);
    }

    //relationToSalesInvoice
    public function sales(){
        return $this->hasMany(SaleInvoice::class);
    }

    //relationToPurchaseInvoice
    public function purchase(){
        return $this->hasMany(PurchesInvoice::class);
    }

    //relationToPaymentInvoice
    public function payment(){
        return $this->hasMany(Payment::class);
    }

    //relationToReceipsInvoice
    public function receipts(){
        return $this->hasMany(Receipt::class);
    }
}

