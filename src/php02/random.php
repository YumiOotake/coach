<?php
if (isset($_POST['btn'])) {
    $omikuji = ['大吉', '中吉', '小吉', '末吉', '凶', '大凶'];
    // $count = count($omikuji);
    // $key = rand(0, $count - 1);

    $result = htmlspecialchars($omikuji[array_rand($omikuji)] ?? null, ENT_QUOTES);

    // $color = null;
    $color = 'black';
    if ($result === '大吉') {
        $color = 'red';
    } elseif ($result === '大凶') {
        $color = 'blue';
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
    <form action="./random.php" method="post">
        <button type="submit" name="btn">おみくじを引く</button>
    </form>
    <div class="result" style="color: <?php echo $color; ?>;"><?php
                                                        if (isset($result)) {
                                                            echo $result;
                                                        } ?></div>
</body>

</html>