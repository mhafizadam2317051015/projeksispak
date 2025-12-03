<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';

    // PRIMARY KEY bukan "id", tapi "kode"
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['kode','nama','deskripsi'];
}
