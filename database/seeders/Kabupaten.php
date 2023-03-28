<?php

namespace Database\Seeders;

use App\Models\Kabupaten as ModelsKabupaten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kabupaten extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupaten = [
            [
                'nama_role' => 'Super Admin',
            ],
            [
                'nama_role' => 'Admin Kabupaten',
            ],
            [
                'nama_role' => 'Admin Desa',
            ],
            [
                'nama_role' => 'Admin Wisata',
            ],
            [
                'nama_role' => 'User',
            ]
        ];

        foreach ($kabupaten as $key => $value) {
            ModelsKabupaten::create($value);
        }
    }
}
