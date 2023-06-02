<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wahana extends Model
{
    use HasFactory;

    protected $table = 'wahana';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_wahana', 'foto_wahana', 'htm_wahana', 'destinasi_id', 'deskripsi_wahana'
    ];
}
