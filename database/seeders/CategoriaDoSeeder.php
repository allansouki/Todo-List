<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
        'name'=> 'allan souki',
        'email'=> 'allan.souki@hotmail.com',
        'password'=> Hash::make('123456')
        ]);
    }
}
