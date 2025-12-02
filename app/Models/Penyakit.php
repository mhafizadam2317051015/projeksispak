<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Penyakit extends Model
{
use HasFactory;
protected $table = 'penyakit';
protected $fillable = ['kode','nama','deskripsi'];


public function gejala()
{
return $this->belongsToMany(Gejala::class, 'penyakit_gejala', 'penyakit_id', 'gejala_id');
}
}