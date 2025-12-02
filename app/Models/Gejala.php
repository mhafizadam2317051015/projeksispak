<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gejala extends Model
{
use HasFactory;
protected $table = 'gejala';
protected $fillable = ['kode','nama'];


public function penyakit()
{
return $this->belongsToMany(Penyakit::class, 'penyakit_gejala', 'gejala_id', 'penyakit_id');
}
}