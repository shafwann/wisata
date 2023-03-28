<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_destinasi', 'kabupaten_id', 'desa_id'
    ];
}
