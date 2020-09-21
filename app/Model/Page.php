<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
