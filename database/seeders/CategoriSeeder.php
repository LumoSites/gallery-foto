<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Categori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'kegiatan luar'],
            ['name' => 'kegiatan dalam'],
            ['name' => 'explorasi'],
        ];

        foreach ($data as $value) {
            Categori::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
