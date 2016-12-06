<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alistarle',
            'email' => 'alistarle@gmail.com',
            'password' => bcrypt("password"),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'password' => bcrypt("password"),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => 'Hello',
            'email' => 'jean.michel@chapka.me',
            'password' => bcrypt("password"),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
