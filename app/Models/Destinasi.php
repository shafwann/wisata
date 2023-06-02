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
        'nama_destinasi', 'kategori_id', 'foto_destinasi', 'province_id', 'regency_id', 'district_id', 'village_id', 'deskripsi_destinasi', 'alamat_destinasi', 'htm_destinasi', 'approve'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'destinasi_id', 'id');
    }
}
