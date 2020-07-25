<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'Name' ,'Image','Description' ,'Color' ,'Capacity' ,'Height' ,'Size' ,'Weight' ,'Diameter','Price','Status','Type','Category'
    ];


    public static function GetItemsCount($TagId){
        return Shop::where('Category' , $TagId)->count();
    }
}
