<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkTrade extends Model
{
    protected $fillable = [
        'Name' , 'Description' , 'Link'
    ];
}
