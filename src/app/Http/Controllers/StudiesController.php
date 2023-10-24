<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studies;

class StudiesController extends Controller
{
    public function StudyTime()
    {
        // 今日の学習データを取得
        $todayStudyData = Studies::whereDate('study_date', now()->format('Y-m-d'))->get();

        // 今日の学習時間を合計
        $todayTotalStudyTime = $todayStudyData->sum('study_time');

        // 今月の学習データを取得
        $monthStudyDate = Studies::whereDate('study_date', '>=', now()->format('Y-m-01'))
            ->whereDate('study_date', '<=', now()->endOfMonth())
            ->get();

        //今月の学習時間を合計
        $monthTotalStudyTime = $monthStudyDate->sum('study_time');

        // すべての学習データを取得
        $allStudyData = Studies::all();

        // すべての学習時間を合計
        $allTotalStudyTime = $allStudyData->sum('study_time');

        // Laravel Eloquentを使用してデータを取得
        $studyData = Studies::select('study_date', 'study_time')->orderBy('study_date')->get();

        // データをJSON形式に整形
        $jsonStudyData = $studyData->toJson();

        return view('webapp/index', [
            'todayTotalStudyTime' => $todayTotalStudyTime,
            'monthTotalStudyTime' => $monthTotalStudyTime,
            'allTotalStudyTime' => $allTotalStudyTime,
            'jsonStudyData'=>$jsonStudyData
        ]);
    }
}
