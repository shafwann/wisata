<?php

namespace Database\Seeders;

use App\Models\Kategori as ModelsKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'nama_kategori' => 'Alam',
                'icon' => 'fa-tree',
            ],
            [
                'nama_kategori' => 'Buatan',
                'icon' => 'fa-building',
            ],
        ];

        foreach ($kategori as $key => $value) {
            ModelsKategori::create($value);
        }
    }
}
