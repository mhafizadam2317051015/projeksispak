<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Penyakit;

class Rule extends Model
{
    protected $table = "rules";

    protected $fillable = [
        'penyakit_kode',
        'gejala_kode',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_kode', 'kode');
    }
}
