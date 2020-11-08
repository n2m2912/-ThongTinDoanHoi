<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function news()
    {
        return $this->hasMany('App\News', 'author', 'id');
    }

    public function files()
    {
        return $this->hasMany('App\File', 'user_upload_id', 'id');
    }

    public function libraries()
    {
        return $this->hasMany('App\Library', 'user_create_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Role', 'role', 'id');
    }

    public static function getListUsers(){
        return \DB::table('users')->select('users.*','roles.role_name')->join('roles','users.role','=','roles.id')->get();
    }

    public function isRole(){
        return $this->role;
    }
}
