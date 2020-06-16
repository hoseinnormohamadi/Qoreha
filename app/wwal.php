<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wwal extends Model
{
    protected $fillable = [
        'Name' , 'Content' , 'ExpireDate' , 'Image' , 'Worker'
    ];
}
