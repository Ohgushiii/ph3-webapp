<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // 今月の日付を生成
        $currentMonth = now()->startOfMonth();
        $dates = [];

        for ($i = 0; $i < 30; $i++) {
            $dates[] = $currentMonth->format('Y-m-d');
            $currentMonth = $currentMonth->addDay();
        }

        // コンテンツと言語の選択肢
        $contents = ['YouTube', 'Udemy', 'ドットインストール', 'POSSE課題'];
        $languages = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'SQL', 'SHELL'];

        // ダミーデータの生成と挿入
        foreach ($dates as $date) {
            DB::table('studies')->insert([
                'study_date' => $date,
                'content_name' => $faker->randomElement($contents),
                'language_name' => $faker->randomElement($languages),
                'study_time' => $faker->numberBetween(1, 24),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
