<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TodoTableSeeder::class);
        $this->call(TaskTableSeeder::class);

        $this->call(PivotTableSeeder::class);
    }
}
