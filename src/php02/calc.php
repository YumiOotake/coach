<?php

// $now = new DateTime();
// $dayOfWeek = $now->format('N');
// if ($dayOfWeek <= 5) {
//     echo '今日は平日です';
// } else {
//     echo '今日は休日です';
// }

// new DateTimeを曜日に変換
function createWeek($now)
{
    $week = [
        '日',
        '月',
        '火',
        '水',
        '木',
        '金',
        '土',
    ];
    $dayWeek = $now->format('w');
    $weekJp = $week[$dayWeek];

    return $weekJp;
}

function createDeliveryDate($limit)
{
    $now = new DateTime('2025-12-12');
    $count = 0;
    $holidays = [];

    while ($count < $limit) {
        $now->modify('+1 day');

        $month = $now->format('n');
        $date = $now->format('j');

        // 判定を「変数」に代入する
        $dayOfWeek = $now->format('N');
        $isWeekend = $dayOfWeek >= 6; //土日
        $isFixedHoliday = in_array($now->format('Y-m-d'), $holidays); //祝日
        $isNewYear = ($month == 12 && $date >= 29) || ($month == 1 && $date <= 3);


        if ($isWeekend || $isFixedHoliday || $isNewYear) {
            continue;
        } else {
            $count++;
        }
    }
    return $now;
}

$deliveryDate = createDeliveryDate(3);
$weekJp = createWeek($deliveryDate);

echo 'お届けは' . $deliveryDate->format('n/j') . '(' . $weekJp . ')です';
// echo '<pre>';
// var_dump($now);
// echo '<pre/>';



// function createDeliveryDate($limit)
// {
//     // 今日からスタート（テスト用に特定の日付を入れることも可能）
//     $now = new DateTime();
//     $count = 0;

//     // 1. 固定の祝日リスト（毎年変わるものはここに追加）
//     $fixedHolidays = [
//         '2026-01-12', // 成人の日
//         '2026-02-11', // 建国記念の日
//         '2026-02-23', // 天皇誕生日
//     ];

//     while ($count < $limit) {
//         $now->modify('+1 day');

//         $month = (int)$now->format('n');
//         $day   = (int)$now->format('j');
//         $ymd   = $now->format('Y-m-d');
//         $dow   = (int)$now->format('N'); // 1(月)〜7(日)

//         // --- 休み判定のフラグを立てる ---

//         $isWeekend = ($dow >= 6); // 条件A: 土日か？

//         $isFixedHoliday = in_array($ymd, $fixedHolidays); // 条件B: 固定祝日リストにあるか？

//         $isNewYear = ($month == 12 && $day >= 29) || ($month == 1 && $day <= 3); // 条件C: 年末年始か？

//         // A、B、Cの「どれか」が正解（true）なら、その日はお休み！
//         if ($isWeekend || $isFixedHoliday || $isNewYear) {
//             continue;
//         }

//         // 休みじゃなければカウントアップ
//         $count++;
//     }

//     return $now;
// }