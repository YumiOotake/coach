<?php

$date = htmlspecialchars($_GET['date'], ENT_QUOTES);
$time = htmlspecialchars($_GET['time'], ENT_QUOTES);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>予約完了しました</h1>
    <dl>
        <dt>日付</dt>
        <dd><?php echo $date; ?></dd>
        <dt>時間</dt>
        <dd><?php echo $time; ?></dd>
    </dl>
</body>

</html>