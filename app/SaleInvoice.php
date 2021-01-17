<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    //relationToUser
    public function users(){
        return $this->belongsTo(User::class);
    }
}
