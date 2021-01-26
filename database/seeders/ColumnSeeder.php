<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('column')->insert([
            'column_title' => 'First Column',
            'column_position' => 1,
        ]);
        DB::table('column')->insert([
            'column_title' => 'Second Column',
            'column_position' => 2,
        ]);
        DB::table('column')->insert([
            'column_title' => 'Third Column',
            'column_position' => 3,
        ]);
	}
}
