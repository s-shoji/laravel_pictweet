<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $array = [
            ['天気', '今日はいい天気だ' ],
            ['プログラミング', 'phpを学んでいます' ],
            ['モチベーション','やったるでー'],
        ];

        foreach ($array as list($title,$content )) {
            DB::table('tweets')->insert([
                'title' => $title,
                'content' => $content,
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
