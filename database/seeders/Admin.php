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
                'name' => 'User 1',
                'email' => 'user1@gmail.com',
                'role_id' => '5',
                'province_id' => null,
                'regency_id' => null,
                'district_id' => null,
                'village_id' => null,
                'phone' => '081234567890',
                'password' => bcrypt('!User1@gmail.com'),
                'edit_admin_desa' => '0',
                'approve_wisata' => '0',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ],
            // [
            //     'name' => 'Wisata Nongko Ijo',
            //     'email' => 'nongkoijo@gmail.com',
            //     'role_id' => '4',
            //     'provinsi_id' => null,
            //     'kabupaten_id' => null,
            //     'kecamatan_id' => null,
            //     'desa_id' => null,
            //     'phone' => '081234567890',
            //     'password' => bcrypt('!Nongkoijo1@gmail.com'),
            //     'edit_admin_desa' => '0',
            //     'approve_wisata' => '0',
            //     'tambah_edit_admin_destinasi' => '0',
            //     'mengajukan_destinasi' => '0',
            //     'konfirmasi_tiket' => '1',
            // ],
            // [
            //     'name' => 'Desa Kare',
            //     'email' => 'desakare@gmail.com',
            //     'role_id' => '3',
            //     'provinsi_id' => null,
            //     'kabupaten_id' => null,
            //     'kecamatan_id' => null,
            //     'desa_id' => null,
            //     'phone' => '081234567890',
            //     'password' => bcrypt('!Desakare1@gmail.com'),
            //     'edit_admin_desa' => '0',
            //     'approve_wisata' => '1',
            //     'tambah_edit_admin_destinasi' => '1',
            //     'mengajukan_destinasi' => '1',
            //     'konfirmasi_tiket' => '0',
            // ],
            [
                'name' => 'Kabupaten Madiun',
                'email' => 'kabupatenmadiun@gmail.com',
                'role_id' => '2',
                'province_id' => '35',
                'regency_id' => '3519',
                'district_id' => null,
                'village_id' => null,
                'phone' => '081234567890',
                'password' => bcrypt('!Kabupatenmadiun1@gmail.com'),
                'edit_admin_desa' => '1',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ],
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
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
