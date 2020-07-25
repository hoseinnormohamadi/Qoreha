<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Username','LastName','FirstName', 'email', 'password','Rule','ProfileImage','Bio','PhoneNumber','FaceBook','Twitter','PhoneActivationCode','EmailActivationCode','identityCartPic','CodeMeli'
        ,'Address','AccountStatus'
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

    public function Posts(){
        return $this->hasMany(Blog::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function FullName(){
        return \Auth::user()->FirstName . ' '. \Auth::user()->LastName;
    }

    public static function GetUserFullName($FirstName,$LastName){
        return $FirstName . ' '. $LastName;

    }

    public static function GetRuleName(){
        if (\Auth::user()->Rule == 'Admin'){
            return 'ادمین';
        }elseif (\Auth::user()->Rule == 'Manager'){
            return 'اپراتور';
        }elseif (\Auth::user()->Rule == 'LotteryOwner'){
            return 'صاحب کسب و کار';
        }elseif (\Auth::user()->Rule == 'Supervisor'){
            return 'ناظر';
        }else{
            return 'کاربر ساده';
        }
    }

    public static function GetRuleNameByRule($Rule){
        if ($Rule == 'Admin'){
            return 'ادمین';
        }elseif ($Rule == 'Manager'){
            return 'اپراتور';
        }elseif ($Rule == 'LotteryOwner'){
            return 'صاحب کسب و کار';
        }elseif ($Rule == 'Supervisor'){
            return 'ناظر';
        }else{
            return 'کاربر ساده';
        }
    }

    public static function NoPic(){
        return '/assets/img/users/NoPic.png';
    }

    public static function GetPublisher($PublisherId){
        return User::find($PublisherId);
    }
}
