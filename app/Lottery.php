<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    protected $fillable = [
        'LotteryTitle','LotteryContent','LotteryFirstPrize','LotteryPrizes','LotteryImage','LotteryType','LotteryWorker','LotteryDate','LotteryMode',
    ];
    public function User(){
        return $this->belongsTo(User::class,'LotteryWorker','id');
    }

    public function tag(){
        return $this->belongsToMany(LotteryCat::class,'Lottery_Cat','Lottery_id');
    }
    public function Categori(){
        return $this->belongsTo(LotteryCat::class,'Category','id');
    }
}
