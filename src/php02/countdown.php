<?php
// 今と卒業までの日数をカウントダウン
// 今の日付
// 卒業の日付
// 差を出す
// 表示する

// $now = new DateTime('2026-01-01');
// $nowDate = $now->format('Y-n-j');

// $graduation = new DateTime('2027-02-01');
// $graduationDate = $graduation->format('Y-n-j');

// $diff = $now->diff($graduation);

// echo $diff->format('%y年%m%d日');

// echo '<pre>';
// var_dump($diff);
// echo '<pre/>';
// echo '<pre>';
// var_dump($nowDate);
// echo '<pre/>';


// $now = new DateTime();
// $last = new DateTime('2026-12-31');
// $graduation = new DateTime(('2026-08-02 18:00:00'));

// $diff = $now->diff($last);
// $diffGraduation = $now->diff($graduation);

// echo $diffGraduation->format('あと%a日%h時間%i分');
// echo '<br/>';


// if ($diff->invert === 1) {
//     echo $diff->format('すでに%a日過ぎています');
// } else {
//     echo $diff->format('%a日');
//     echo '<br/>';
//     echo $diff->format('%y年%mヶ月%d日');
// }


// $now = new DateTime();
// $birthday = new DateTime('1995-11-30');
// $year = $now->diff($birthday);
// echo $year->format('%y歳です');


// // 今年の誕生日
// $thisBirthday = new DateTime($now->format('Y'). '-11-30');
// // 過ぎてたら来年の誕生日で
// if ($now > $thisBirthday) {
//     $thisBirthday->modify('+1 year');
// }
// $nextBirthday = $thisBirthday->diff($now);
// echo $nextBirthday->format('あと%a日です');


$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$birthday = new DateTime(htmlspecialchars($_POST['date'], ENT_QUOTES)); //1990-11-11
$now = new DateTime();

// 今年の誕生日
$thisYearBirthday = new DateTime($now->format('Y'). '-'.$birthday->format('m-d'));
if ($now > $thisYearBirthday) {
    $birthday->modify('+1 year');
}

$diff = $now->diff($thisYearBirthday);

echo $name.'さん';
echo $diff->format('お誕生日まであと%a日');