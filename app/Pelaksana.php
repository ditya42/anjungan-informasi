<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaksana extends Model
{
    protected $table = 'kompetensi_pelaksana';

    protected $fillable = [
        'uraian_kompetensi_pelaksana', 'layanan_id','created_at', 'updated_at'
    ];

    protected $primaryKey = 'kompetensi_pelaksana_id';
}
