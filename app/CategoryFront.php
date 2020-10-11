<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFront extends Model
{
    protected $fillable = [
        'Name' , 'Image' , 'Link','BlongTo'
    ];
}
