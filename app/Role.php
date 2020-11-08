<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    public function user()
    {
        return $this->hasMany('App\User', 'role', 'id');
    }

    public static function getRolesById($id){
        return \DB::table('roles')->select('roles.*')->where('id',$id)->get();
    }
}
