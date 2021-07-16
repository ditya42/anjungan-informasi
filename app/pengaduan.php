<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    protected $fillable = [
        'nama_terlapor', 'jabatan', 'perbuatan', 'perkara', 'status',
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan');
    }
}
