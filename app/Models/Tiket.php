<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_pemesan', 'jumlah_tiket', 'tanggal_kunjungan', 'user_id', 'destinasi_id', 'wahana_id', 'paket_id', 'konfirmasi'
    ];

    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class);
    }
}
