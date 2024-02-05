<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'first_name' => 'amin',
                'last_name'=> 'bro',
                'username'=> 'aminbro',
                'password' => bcrypt('rahasia')
            ],
            [
                'first_name' => 'bot',
                'last_name'=> '',
                'username'=> 'bto123',
                'password' => bcrypt('rahasia')
            ]
        ];

        foreach ($data as $value) {
            User::insert([
                'first_name' => $value['first_name'],
                'last_name'=> $value['last_name'],
                'username'=> $value['username'],
                'password'=> bcrypt($value['password']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
