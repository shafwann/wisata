<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;

    protected $table = 'profil_desa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_desa', 'foto_desa', 'deskripsi_desa', 'alamat_desa', 'admin_id', 'province_id', 'regency_id', 'district_id', 'village_id'
    ];
}
