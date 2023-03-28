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
                'phone' => '081234567890',
                'password' => bcrypt('!User1@gmail.com'),
                'edit_admin_desa' => '0',
                'approve_wisata' => '0',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '0',
            ],
            [
                'name' => 'Admin Wisata Nongko Ijo',
                'email' => 'adminnongkoijo@gmail.com',
                'role_id' => '4',
                'phone' => '081234567890',
                'password' => bcrypt('!Adminnongkoijo1@gmail.com'),
                'edit_admin_desa' => '0',
                'approve_wisata' => '0',
                'tambah_edit_admin_destinasi' => '0',
                'mengajukan_destinasi' => '0',
                'konfirmasi_tiket' => '1',
            ],
            [
                'name' => 'Admin Desa Kare',
                'email' => 'admindesakare@gmail.com',
                'role_id' => '3',
                'phone' => '081234567890',
                'password' => bcrypt('!Admindesakare1@gmail.com'),
                'edit_admin_desa' => '0',
                'approve_wisata' => '1',
                'tambah_edit_admin_destinasi' => '1',
                'mengajukan_destinasi' => '1',
                'konfirmasi_tiket' => '0',
            ],
            [
                'name' => 'Admin Kabupaten Madiun',
                'email' => 'adminkabupatenmadiun@gmail.com',
                'role_id' => '2',
                'phone' => '081234567890',
                'password' => bcrypt('!Adminkabupatenmadiun1@gmail.com'),
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
