<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin'),
            'photo' => null
        ]);

        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@email.com',
            'password' => Hash::make('admin'),
            'photo' => null
        ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'email' => 'ustinenjazilgan@mail.com',
        // ]);
        // User::factory(5)->create();
    }
}
