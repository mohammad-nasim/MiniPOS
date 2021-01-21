<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = ['user_id', 'admin_id', 'amount', 'note', 'date'];

    //relationToAdmin
    public function admin(){
        return $this->belongsTo(Admin::class);
    }


}

