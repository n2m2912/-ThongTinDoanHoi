<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "types";
    
    public function newsByType()
    {
        return $this->hasMany('App\News', 'type', 'id');
    }
    public static function getListType(){
        return \DB::table('types')->get();
    }

    public static function getTypeById($id){
        return \DB::table('types')->select('types.*')->where('id',$id)->get();
    }

}
