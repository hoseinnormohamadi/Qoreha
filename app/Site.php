<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'AboutUs','SiteName','Icon','Enamad','Smandehi','PhoneNumber','Address','Facebook','twitter','instagram','Telegram'
    ];
    public static function SiteName(){
        return Site::find(1)->SiteName;
    }
    public static function SiteIcon(){
        return '\assets\img\favicon.ico';
    }
}
