<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (!isset($_POST['date'])) {
        $errors[] = '日付を入力してください';
    }
    $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
    if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $date)) {

        $errors[] = '日付を正しく入力してください';
    }

    $inputDate = new DateTime($date);
    $now = new DateTime('today');
    if ($inputDate < $now) {
        $errors[] = '日付が過去です';
    }
    if ($inputDate->format('N') >= 6) {
        echo '土日は特別料金が発生します<br/>';
    }

    if (!isset($_POST['time'])) {
        $errors[] = '時間を入力してください';
    }
    $time = htmlspecialchars($_POST['time'], ENT_QUOTES);

    $inputTime = new DateTime($time);
    $startTime = new DateTime('10:00');
    $endTime = new DateTime('18:00');
    if ($inputTime < $startTime || $inputTime > $endTime) {
        $errors[] = '時間は10:00~18:00までです';
    }

    if (empty($errors)) {
        header('Location:time_ok.php?date='.$date.'&time='.$time);
        exit();
    } else {
        foreach ($errors as $error) {
            echo $error . '<br/>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./time.php" method="post">
        <h1>予約日時選択</h1>
        <label for="date">日付</label>
        <input type="date" name="date" id="date"><br />
        <label for="time">時間 ⚠️10:00~18:00まで</label>
        <input type="time" name="time" id="time">
        <button type="submit">決定</button>
    </form>
</body>

</html>