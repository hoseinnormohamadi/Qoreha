<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'Name','Content','Image','Status','ExpireDate'
    ];
}
