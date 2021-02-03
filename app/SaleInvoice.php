<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable = ['user_id', 'admin_id', 'chalan_no', 'note', 'date'];

    //relationToUser
    public function users(){
        return $this->belongsTo(User::class);
    }

    //relationToAdmin
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    //relationToSaleItems
    public function saleitems(){
        return $this->hasMany(SaleItems::class);
    }

    //relationToReceipt
    public function receipt(){
        return $this->hasMany(Receipt::class);
    }









}
