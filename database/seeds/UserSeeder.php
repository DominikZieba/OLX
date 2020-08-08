<?php

use App\User;
use Illuminate\Database\Seeder;
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
        $table = new User();
        $table->nick = "admin";
        $table->name = "admin";
        $table->surname = "admin";
        $table->email = "admin@olx.pl";
        $table->phone = "123123123";
        $table->password = Hash::make("admin@olx.pl");
        $table->save();
    }
}
