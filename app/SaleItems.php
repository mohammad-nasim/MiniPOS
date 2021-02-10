<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItems extends Model
{
    protected $fillable = ['product_id', 'sale_invoice_id', 'quantity', 'price', 'total'];

    //relationToSaleInvoice
    public function saleinvoice(){
        return $this->belongsTo(SaleInvoice::class, 'sale_invoice_id',   'id');
    }

    //relationToProduct
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
