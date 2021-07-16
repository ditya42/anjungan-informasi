<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyelesaian extends Model
{
    protected $table = 'waktu_penyelesaian';

    protected $fillable = [
        'uraian_penyelesaian', 'layanan_id','created_at', 'updated_at'
    ];

    protected $primaryKey = 'penyelesaian_id';
}
