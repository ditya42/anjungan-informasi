<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prosedur extends Model
{
    protected $table = 'prosedur';

    protected $fillable = [
        'uraian_prosedur', 'layanan_id','created_at', 'updated_at'
    ];

    protected $primaryKey = 'prosedur_id';
}
