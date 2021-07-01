<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DasarLayanan extends Model
{
    protected $table = 'dasar_layanan';

    protected $fillable = [
        'dasarhukum_id', 'layanan_id', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'dasarlayanan_id';
}
