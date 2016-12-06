<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'content' => 'Redémarrer PostGIS',
            'todo_id' => 1,
            'finished' => 1,
            'priority' => 1,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('tasks')->insert([
            'content' => 'Changer la ram JAVA',
            'todo_id' => 1,
            'finished' => 0,
            'priority' => 2,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('tasks')->insert([
            'content' => 'Modifier les données OSM',
            'todo_id' => 1,
            'finished' => 0,
            'priority' => 3,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);


        DB::table('tasks')->insert([
            'content' => 'Ajouter une connexion via google',
            'todo_id' => 2,
            'finished' => 0,
            'priority' => 1,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('tasks')->insert([
            'content' => 'Faire un widget / notification persistante',
            'todo_id' => 2,
            'finished' => 0,
            'priority' => 1,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
