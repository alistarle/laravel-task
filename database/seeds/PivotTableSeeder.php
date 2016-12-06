<?php

use Illuminate\Database\Seeder;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_user')->insert([
            'task_id' => 1,
            'user_id' => 1
        ]);

        DB::table('task_user')->insert([
            'task_id' => 1,
            'user_id' => 2
        ]);

        DB::table('task_user')->insert([
            'task_id' => 2,
            'user_id' => 1
        ]);

        DB::table('task_user')->insert([
            'task_id' => 3,
            'user_id' => 1
        ]);

        DB::table('task_user')->insert([
            'task_id' => 4,
            'user_id' => 2
        ]);

        DB::table('task_user')->insert([
            'task_id' => 4,
            'user_id' => 3
        ]);

        DB::table('task_user')->insert([
            'task_id' => 5,
            'user_id' => 1
        ]);
    }
}
