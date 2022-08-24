<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crear un usuario
        $u= new User();
        $u->name="cristian";
        $u->email="cbo@misena.edu.co";

        //utilizar la clase hash
        $u->password = Hash::make("12345");
        $u->save();
    }
}

