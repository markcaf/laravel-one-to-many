<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'post_content',
        'post_image',
        'post_date',
        'author',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
