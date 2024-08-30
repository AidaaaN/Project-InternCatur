<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $akuns = [
            [
                'email'=>'mdglenaaa01@gmail.com',
                'password'=> Hash::make(123456),
                'level'=>'admin'

            ]
        ];

        foreach($akuns as $key => $val){
            User::create($val);
        }
    }
}
