<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'Name','Link','Image','Status','ExpireDate'
    ];
}
