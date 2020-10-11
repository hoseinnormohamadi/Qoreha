<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wwal extends Model
{
    protected $fillable = [
        'Name' , 'Content' , 'ExpireDate' , 'Image' , 'Worker' , 'SubCategory' ,'Category'
    ];

    public function User(){
        return $this->belongsTo(User::class,'Worker','id');
    }

    public function Categori(){
        return $this->belongsTo(LotteryCat::class,'Category','id');
    }
}
