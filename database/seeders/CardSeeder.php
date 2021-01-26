<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$desc = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida volutpat lectus, ac fermentum turpis. Praesent sed nulla eget felis maximus dignissim et in lorem. Nulla consectetur facilisis libero, et volutpat libero vulputate vitae. Fusce diam nulla, euismod rhoncus diam luctus, luctus semper ligula. ';
        DB::table('card')->insert([
            'column_id' => 1,
            'card_title' => '1st Card',
            'card_description' => $desc,
            'card_position' => 1,
        ]);
        DB::table('card')->insert([
            'column_id' => 2,
            'card_title' => '1st Card',
            'card_description' => $desc,
            'card_position' => 1,
        ]);
        DB::table('card')->insert([
            'column_id' => 2,
            'card_title' => '2nd Card',
            'card_description' => $desc,
            'card_position' => 2,
        ]);
        DB::table('card')->insert([
            'column_id' => 2,
            'card_title' => '3rd Card',
            'card_description' => $desc,
            'card_position' => 3,
        ]);
        DB::table('card')->insert([
            'column_id' => 3,
            'card_title' => '1st Card',
            'card_description' => $desc,
            'card_position' => 1,
        ]);
        DB::table('card')->insert([
            'column_id' => 3,
            'card_title' => '2nd Card',
            'card_description' => $desc,
            'card_position' => 2,
        ]);
	}
}
