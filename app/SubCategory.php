<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name' , 'Parent','Image'
    ];


    public function Parents(){
        return $this->hasOne(LotteryCat::class,'id','Parent');
    }
}
