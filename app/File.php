<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "files";

    public function user()
    {
        return $this->belongsTo('App\User', 'user_upload_id', 'id');
    }

    public function new()
    {
        return $this->belongsTo('App\News', 'file', 'id');
    }

    public function library()
    {
        return $this->belongsTo('App\Library', 'library', 'id');
    }

    public static function getFiles(){
        return \DB::table('files')->select('files.*','users.full_name')->join('users','users.id','=','files.user_upload_id')->get(); 
    }

    public static function getFileById($id){
        return \DB::table('files')->select('files.*','users.full_name')->join('users','users.id','=','files.user_upload_id')->where('files.id',$id)->get(); 
    }
    
    public static function getFilesByUserId($id){
        return \DB::table('files')->select('files.*','users.full_name')->join('users','users.id','=','files.user_upload_id')->where('user_upload_id',$id)->get(); 
    }
}
