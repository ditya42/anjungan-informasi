<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    protected $table = 'persyaratan';

    protected $fillable = [
        'uraian_persyaratan', 'layanan_id','created_at', 'updated_at'
    ];

    protected $primaryKey = 'persyaratan_id';
}
