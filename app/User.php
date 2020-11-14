<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['admin_id', 'group_id', 'name', 'email', 'phone','address'];

    public function group(){
        return $this->belongsTo(UserGroup::class);
    }
}

