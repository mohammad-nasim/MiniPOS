<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchesItems extends Model
{
    protected $fillable = ['product_id', 'purches_invoice_id', 'quantity', 'price', 'total'];

    //relationToSaleInvoice
    public function purchesinvoice(){
        return $this->belongsTo(PurchesInvoice::class);
    }

    //relationToProduct
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
