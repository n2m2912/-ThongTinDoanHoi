<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    public function file()
    {
        return $this->hasMany('App\File', 'file', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Type', 'type', 'id');
    }

    public static function getNews(){
        return \DB::table('news')->select('news.*','users.full_name','types.type_name')->join('users','users.id','=','news.author')->join('types','types.id','news.type')->get(); 
    }

    public static function getNewByID($id){
        return \DB::table('news')->select('news.*','files.id as image_id','files.file_name','files.file_path','types.type_name')->join('files','files.new','=','news.id')->join('types','types.id','news.type')->where('news.id',$id)->get(); 
    }

    public static function getNameAndId(){
        return \DB::table('news')->select('news.new_title','news.id')->get(); 
    }

    public static function getNewsByUserId($id){
        return \DB::table('news')->select('news.*','users.full_name','types.type_name')->join('users','users.id','=','news.author')->join('types','types.id','news.type')->where('author',$id)->get(); 
    }

    public static function getNewsByTypeLimit($id){
        return \DB::table('news')->select('news.*','files.file_name')->join('files','news.id','=','files.new')->whereRaw('news.type = '.$id.' AND news.censored = 1')->orderBy('id', 'desc')->limit(6)->get();    }

    public static function getNewByType($id){
        return \DB::table('news')->select('news.*','files.file_name')->join('files','news.id','=','files.new')->whereRaw('news.type = '.$id.' AND news.censored = 1')->orderBy('id', 'desc')->paginate(10);
    }

    public static function search($str){
        return \DB::table('news')->select('news.*','files.file_name')->join('files','news.id','=','files.new')->whereRaw('news.new_title like "%'.$str.'%" AND news.censored = 1')->orderBy('id', 'desc')->paginate(10);
    }
}
