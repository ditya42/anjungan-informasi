<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProsedur extends Model
{
    protected $table = 'subprosedur';

    protected $fillable = [
        'uraian_subprosedur', 'prosedur_id','created_at', 'updated_at'
    ];

    protected $primaryKey = 'subprosedur_id';
}
