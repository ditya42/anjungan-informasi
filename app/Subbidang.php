<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subbidang extends Model
{
    protected $table = 'sub_bidang';

    protected $fillable = [
        'nama_subbidang', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'subbidang_id';
}
