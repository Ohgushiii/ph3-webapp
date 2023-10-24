<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // コンテンツテーブルにダミーデータを挿入
        $contents = [
            ['content_name' => 'YouTube'],
            ['content_name' => 'Udemy'],
            ['content_name' => 'ドットインストール'],
            ['content_name' => 'POSSE課題'],
        ];

        foreach ($contents as $content) {
            DB::table('contents')->insert($content);
        }
    }
}
