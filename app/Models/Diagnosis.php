<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Diagnosis extends Model
{
use HasFactory;
protected $table = 'diagnosis';
protected $fillable = ['user_id','gejala_user','hasil'];


protected $casts = [
'gejala_user' => 'array',
'hasil' => 'array',
];
}