<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeLotterry extends Model
{
    protected  $fillable = [
        'Name','Description','Image','Members','Wins','Amount','Payment','Period','StartDate','Owner',
    ];
    public function User(){
        return $this->belongsTo(User::class,'Owner','id');
    }
}
