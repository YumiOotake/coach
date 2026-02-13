<?php
require_once('./functions/search_city_time2.php');
$tokyo = searchCityTime('東京');

$city = htmlspecialchars($_GET['city'], ENT_QUOTES);
$result = searchCityTime($city);

// echo '<pre>';
// var_dump($result);
// echo '<pre/>';
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/sanitize.css">
    <link rel="stylesheet" href="./css/common2.css">
    <link rel="stylesheet" href="./css/result2.css">
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <h1 class="header__ttl">World Clock</h1>
        </div>
    </header>
    <section class="result__inner">
        <div class="result">
            <div class="result__content">
                <div class="result__city-image">
                    <img class="result__city-img" src="./img/<?php echo $tokyo['img'] ?>" alt="国旗">
                </div>
                <div class="result__city-text">
                    <p class="result__city-name"><?php echo $tokyo['name'] ?></p>
                    <p class="result__city-date"><?php echo $tokyo['time'] ?></p>
                </div>
            </div>
            <div class="result__content">
                <div class="result__city-image">
                    <img class="result__city-img" src="./img/<?php echo $result['img'] ?>" alt="国旗">
                </div>
                <div class="result__city-text">
                    <p class="result__city-name"><?php echo $result['name'] ?></p>
                    <p class="result__city-date"><?php echo $result['time'] ?></p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>