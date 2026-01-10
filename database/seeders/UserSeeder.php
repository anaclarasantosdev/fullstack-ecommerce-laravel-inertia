<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ana Clara Santos',
            'email' => 'anaclarasantos.dev@gmail.com',
            'password' => bcrypt('Clara1701@'),
        ]);
    }
}
