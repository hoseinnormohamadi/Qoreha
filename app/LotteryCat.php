<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LotteryCat extends Model
{
    protected $table = 'lottery_categories';
    protected $fillable = [
        'name',
    ];
    public function Lotterys(){
        return $this->belongsToMany(Lottery::class,'Lottery_Cat','Cat_id','Lottery_id');
    }
}
