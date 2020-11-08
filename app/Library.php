<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = "libraries";
    public function files()
    {
        return $this->hasMany('App\File', 'library', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_create_id', 'id');
    }

    public static function getNameAndId(){
        return \DB::table('libraries')->select('libraries.library_title','libraries.id')->get(); 
    }

    public static function getListLibrary(){
        return \DB::table('libraries')->select('libraries.*','users.full_name')->join('users','users.id','libraries.user_create_id')->get(); 
    }

    public static function getLibraryById($id){
        return \DB::table('libraries')->select('libraries.*')->where('id',$id)->get();
    }
}
