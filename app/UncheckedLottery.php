<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UncheckedLottery extends Model
{
    protected $table = 'uncheckedLottery';
    protected $fillable = [
        'LotteryContent' , 'LotteryImage' , 'LotteryImageLink' , 'Worker'
    ];


    public function User(){
        return $this->belongsTo(User::class,'Worker','id');
    }
}
