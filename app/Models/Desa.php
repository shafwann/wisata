<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_desa', 'kabupaten_id', 'alamat', 'user_id'
    ];
}
