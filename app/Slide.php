<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slide";


    public static function getListSlide(){
        return \DB::table('slide')->get();
    }

    public static function getSlideById($id){
        return \DB::table('slide')->select('slide.*')->where('slide.id',$id)->get(); 
    }
}
