<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            //'id' => 2,
            'name'=> 'Sara',
            'email' => 'sara@gmail.com',
            'password'=> Hash::make('12345678'),//Se debe hacer de esta manera, segun el profe es la manera
        ]);
    }
}
