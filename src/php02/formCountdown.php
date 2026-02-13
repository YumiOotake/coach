<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/sanitize.css">
    <link rel="stylesheet" href="./css/countdown.css">
</head>

<body>
    <div class="form__content">
        <div class="form__heading">
            <h1 class="form__title">入力画面</h1>
        </div>

        <form action="./countdown.php" class="form" method="post">
            <div class="form__item">
                <label for="name" class="form__item-label">お名前</label>
                <input type="text" name="name" id="name" class="form__item-input">
            </div>
            <div class="form__item">
                <label for="date" class="form__item-label">生年月日</label>
                <input type="date" name="date" id="date" class="form__item-input">
            </div>
            <div class="form__button">
                <button class="form__button-submit">送信</button>
            </div>
        </form>
    </div>
</body>

</html>