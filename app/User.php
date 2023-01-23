<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','direccion','telefono'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dependencias(){
        return $this->belongsToMany(Dependencia::class,'user_has_dependencias')
        ->withPivot('user_id','dependencia_id');
     }

     public function roles(){
        return $this->belongsToMany(Role::class,'role_user')
        ->withPivot('user_id','role_id');
     }

   

     public function hasDependencia(){   
        return count($this->dependencias) > 0 ? true : false;
      }



}
