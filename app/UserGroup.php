<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $fillable = [ 'title' ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public static function arrForSelect(){

        $groups = UserGroup::all();
        $arr = [];

        foreach($groups as $group){
            $arr[$group->id] = $group->title;
        }
        
        return $arr;
    }
    
    
}
