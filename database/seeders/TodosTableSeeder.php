<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => '買い物に行く',
        ];
        DB::table('todos')->insert($param);

        $param = [
            'content' => 'ご飯を作る',
        ];
        DB::table('todos')->insert($param);

        $param = [
            'content' => 'Todoリストアプリを作る',
        ];
        DB::table('todos')->insert($param);
    }
}
