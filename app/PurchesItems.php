<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchesItems extends Model
{
    //relationToSaleInvoice
    public function purchesinvoice(){
        return $this->belongsTo(PurchesInvoice::class);
    }
}
