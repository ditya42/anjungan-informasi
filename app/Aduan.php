<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'pengelolaan_aduan';

    protected $fillable = [
        'uraian_pengelolaan_aduan', 'layanan_id','created_at', 'updated_at'
    ];

    protected $primaryKey = 'pengelolaan_aduan_id';
}
