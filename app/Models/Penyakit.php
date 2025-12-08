<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakits';

    protected $fillable = [
        'kode', 'nama', 'deskripsi',
        'perilaku', 'penanganan', 'saran'
    ];

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'penyakit_gejala', 'penyakit_id', 'gejala_id');
    }
}
