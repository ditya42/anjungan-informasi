<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPersyaratan extends Model
{
    protected $table = 'subpersyaratan';

    protected $fillable = [
        'uraian_subpersyaratan', 'persyaratan_id','created_at', 'updated_at'
    ];

    protected $primaryKey = 'subpersyaratan_id';
}
