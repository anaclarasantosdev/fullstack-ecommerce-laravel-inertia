<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        User::create([
            'name' => 'Administrador do Sistema',           
            'email' => 'admin@example.com',
            'password' => Hash::make('admin12345'),
        ]);}



}