<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $senha = bcrypt('123456'); // senha do admin

        $admin = DB::table('users')->insertGetId([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => $senha,
        ]);
    }
}
