<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $fillable = [
        'name',
    ];
    public function Posts(){
        return $this->belongsToMany(Blog::class,'Post_tag','tags_id','Post_id');
    }
}
