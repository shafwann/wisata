<?php

namespace Database\Seeders;

use App\Models\Tiket as ModelsTiket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tiket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiket = [
            // Belum Dikonfirmasi
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '1',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '2',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '3',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '4',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '5',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '6',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '6',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '5',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '4',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '3',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '2',
                'konfirmasi' => '0',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '1',
                'konfirmasi' => '0',
            ],
            // Dikonfirmasi
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '1',
                'konfirmasi' => '1',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '2',
                'konfirmasi' => '1',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '3',
                'konfirmasi' => '1',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '4',
                'konfirmasi' => '1',
            ],
            [
                'nama_pemesan' => 'User 1',
                'jumlah_tiket' => 2,
                'tanggal_kunjungan' => '2024-05-29',
                'user_id' => '22',
                'destinasi_id' => '5',
                'konfirmasi' => '1',
            ],
        ];

        foreach ($tiket as $key => $value) {
            ModelsTiket::create($value);
        }
    }
}
