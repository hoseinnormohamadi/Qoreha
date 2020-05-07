<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UncheckedLottery extends Model
{
    protected $table = 'unchecked_lottery';
    protected $fillable = [
        'LotteryContent' , 'LotteryImage' , 'LotteryImageLink' , 'Worker'
    ];
}
