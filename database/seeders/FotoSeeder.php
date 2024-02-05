<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Foto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'foto' => '',
                'title' => 'Mencari harta karun',
                'user_id' => 2,
                'categori_id' => 1,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa corporis expedita dolorum ex facilis quia obcaecati tenetur ea unde quidem vel tempora, consectetur repellat consequatur minima perspiciatis esse sed iste!'
            ],
            [
                'foto' => '',
                'title' => 'Bermain kartu',
                'user_id' => 2,
                'categori_id' => 2,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa corporis expedita dolorum ex facilis quia obcaecati tenetur ea unde quidem vel tempora, consectetur repellat consequatur minima perspiciatis esse sed iste!'
            ],
        ];

        foreach ($data as $value) {
            Foto::insert([
                'foto' => $value['foto'],
                'title'=> $value['title'],
                'user_id'=> $value['user_id'],
                'categori_id'=> $value['categori_id'],
                'upload' => Carbon::now()->format('Y-m-d'),
                'description' =>$value['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
