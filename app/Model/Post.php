<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use VanOns\Laraberg\Models\Gutenbergable;

class Post extends Model
{
    use Gutenbergable,SoftDeletes;
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function categories() {
        return $this->belongsToMany('App\Model\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Model\Tag');
    }


    //attribute
    public function getMinContentAttribute()
    {
        return mb_strimwidth($this->content,0,200,"...");
    }

    public function getLinkAttribute()
    {
        return $this->created_at->format('Y/m/d/').$this->slug;
    }
}
