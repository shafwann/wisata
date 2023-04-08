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
        'nama_destinasi', 'kabupaten_id', 'desa_id', 'users_id'
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
