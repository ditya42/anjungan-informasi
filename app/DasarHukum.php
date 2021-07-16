<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DasarHukum extends Model
{
    protected $table = 'dasar_hukum';

    protected $fillable = [
        'nama_peraturan', 'tentang', 'created_at', 'updated_at'
    ];

    protected $primaryKey = 'dasarhukum_id';
}
