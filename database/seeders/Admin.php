<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'role_id' => '1',
                'province_id' => null,
                'regency_id' => null,
                'district_id' => null,
                'village_id' => null,
                'phone' => '081234567890',
                'password' => bcrypt('!Superadmin1@gmail.com'),
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '1',
                'mengajukan_destinasi' => '1',
                'konfirmasi_tiket' => '1',
            ],
            [
                'name' => 'Kabupaten Madiun',
                'email' => 'madiun@gmail.com',
                'role_id' => '2',
                'province_id' => '35',
                'regency_id' => '3519',
                'district_id' => null,
                'village_id' => null,
                'phone' => '081234567890',
                'password' => bcrypt('!Madiun1@gmail.com'),
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ],
            [
                'name' => 'Kabupaten Karanganyar',
                'email' => 'karanganyar@gmail.com',
                'role_id' => '2',
                'province_id' => '33',
                'regency_id' => '3313',
                'district_id' => null,
                'village_id' => null,
                'phone' => '081234567890',
                'password' => bcrypt('!Karanganyar1@gmail.com'),
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ],
            [
                'name' => 'Kota Surakarta',
                'email' => 'surakarta@gmail.com',
                'role_id' => '2',
                'province_id' => '33',
                'regency_id' => '3372',
                'district_id' => null,
                'village_id' => null,
                'phone' => '081234567890',
                'password' => bcrypt('!Surakarta1@gmail.com'),
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ],
            [
                'name' => 'Desa Tawangmangu',
                'email' => 'tawangmangu@gmail.com',
                'role_id' => '3',
                'province_id' => '33',
                'regency_id' => '3313',
                'district_id' => '3313060',
                'village_id' => '3313060003',
                'phone' => '081234567890',
                'password' => bcrypt('!Tawangmangu1@gmail.com'),
                'edit_admin_desa' => '0',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '1',
                'mengajukan_destinasi' => '1',
                'konfirmasi_tiket' => '0',
            ],
            [
                'name' => 'Desa Kalisoro',
                'email' => 'kalisoro@gmail.com',
                'role_id' => '3',
                'province_id' => '33',
                'regency_id' => '3313',
                'district_id' => '3313060',
                'village_id' => '3313060004',
                'phone' => '081234567890',
                'password' => bcrypt('!Kalisoro1@gmail.com'),
                'edit_admin_desa' => '0',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '1',
                'mengajukan_destinasi' => '1',
                'konfirmasi_tiket' => '0',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
