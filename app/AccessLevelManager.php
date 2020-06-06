<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevelManager extends Model
{
    protected $fillable = [
        'CodeMeli','Address','About','identityCartPic','Userid','Type'
    ];
    public function User(){
        return $this->belongsTo(User::class,'Userid','id');
    }
}
