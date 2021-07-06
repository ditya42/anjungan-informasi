<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk_layanan';

    protected $fillable = [
        'uraian_produk', 'layanan_id','created_at', 'updated_at'
    ];

    protected $primaryKey = 'produk_id';
}
