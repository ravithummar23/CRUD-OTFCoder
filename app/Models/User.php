<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'first_name','last_name','email','password','phone','profile_image','role','verify','token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getProfilePictureAttribute($value)
    {   
        if(is_null($value)){
            $video_path =   Url('/default/default_user.png');
        }else{
            $video_path = Url('/upload/profile/'.$value);
        }
        return $video_path;
    }
}
