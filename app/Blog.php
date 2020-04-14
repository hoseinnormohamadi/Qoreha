<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Blog extends Model
{
    protected $table = 'Blog';
    protected $fillable = [
        'PostName', 'PostContent', 'PostImage','PostPublisher','PostStatus'
    ];

    public function User(){
        return $this->belongsTo(User::class,'PostPublisher','id');
    }
    public function tag(){
        return $this->belongsToMany(Tags::class,'Post_tag','Post_id');
    }
}
