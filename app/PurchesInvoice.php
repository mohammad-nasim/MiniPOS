<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchesInvoice extends Model
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

    public function purchaseitem(){
        return $this->hasMany(PurchesItems::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }

}

