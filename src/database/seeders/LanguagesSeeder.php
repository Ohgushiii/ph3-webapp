<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // languagesテーブルにダミーデータを挿入
        $languages = [
            ['language_name' => 'HTML'],
            ['language_name' => 'CSS'],
            ['language_name' => 'JavaScript'],
            ['language_name' => 'PHP'],
            ['language_name' => 'Laravel'],
            ['language_name' => 'SQL'],
            ['language_name' => 'SHELL'],
        ];
        foreach ($languages as $language) {
            DB::table('languages')->insert($language);
        }
    }
}
