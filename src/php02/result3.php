<?php
$city = htmlspecialchars($_GET['city'], ENT_QUOTES);
$date = new DateTime();

require_once('./functions/search_city_time3.php');
$cityInfo = getCityTime($city);
$name = $cityInfo['name'];
$timeZone = $date->setTimezone(new DateTimeZone($cityInfo['time_zone']));
$time = $timeZone->format('H:i');
$img = $cityInfo['img'];

$tokyo = getCityTime('東京');
$tokyoName = $tokyo['name'];
$tokyoTimeZone = $date->setTimezone(new DateTimeZone($tokyo['time_zone']));
$tokyoTime = $tokyoTimeZone->format('H:i');
$tokyoImg = $tokyo['img'];
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="world clock">
    <title>clock</title>
    <link rel="stylesheet" href="./css/sanitize.css">
    <link rel="stylesheet" href="./css/common3.css">
    <link rel="stylesheet" href="./css/result3.css">
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <h1 class="header__title">World Clock</h1>
        </div>
    </header>

    <main class="main">
        <section class="result__content">
            <div class="result-cards">
                <div class="result-card">
                    <div class="result-card__image">
                        <img src="./img/<?php echo $tokyoImg; ?>" alt="" class="result-card__img">
                    </div>
                    <div class="result-card__body">
                        <p class="result-card__city"><?php echo $tokyoName; ?></p>
                        <p class="result-card__time"><?php echo $tokyoTime; ?></p>
                    </div>
                </div>
            </div>
            <div class="result-cards">
                <div class="result-card">
                    <div class="result-card__image">
                        <img src="./img/<?php echo $img; ?>" alt="" class="result-card__img">
                    </div>
                    <div class="result-card__body">
                        <p class="result-card__city"><?php echo $name; ?></p>
                        <p class="result-card__time"><?php echo $time; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>