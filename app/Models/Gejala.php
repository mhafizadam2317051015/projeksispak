<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejalas';
    protected $fillable = ['kode', 'nama', 'deskripsi'];

    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class, 'penyakit_gejala', 'gejala_id', 'penyakit_id');
    }
}
