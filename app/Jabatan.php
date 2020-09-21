<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
        'nama_jabatan'
    ];


    public function pengaduan() {
        return $this->hasOne('App\pengaduan');
    }
}
