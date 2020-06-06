<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QorekeshiKhanegi extends Model
{

    protected $fillable = [
        ''
    ];
    public function User(){
        return $this->belongsTo(User::class,'PostPublisher','id');
    }
}
