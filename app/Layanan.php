<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan', 'subbidang_i', 'biaya', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'layanan_id';
}
