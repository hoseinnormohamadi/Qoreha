<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'UserID' , 'ParentID' , 'Text' , 'Type'
    ];

    public function User(){
        return $this->belongsTo(User::class,'UserID','id');
    }
}
