<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="world clock">
    <title>clock</title>
    <link rel="stylesheet" href="./css/sanitize.css">
    <link rel="stylesheet" href="./css/common3.css">
    <link rel="stylesheet" href="./css/index3.css">
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <h1 class="header__title">World Clock</h1>
        </div>
    </header>

    <main class="main">
        <div class="form__logo">
            <h2 class="form__title">日本と世界の時間を比較</h2>
        </div>
        <form action="./result3.php" method="get" class="form">
            <div class="form__select">
                <select name="city" class="form__select-city">
                    <option class="form__select-item" value="シドニー">シドニー</option>
                    <option class="form__select-item" value="上海">上海</option>
                    <option class="form__select-item" value="モスクワ">モスクワ</option>
                    <option class="form__select-item" value="ロンドン">ロンドン</option>
                    <option class="form__select-item" value="ヨハネスブルグ">ヨハネスブルグ</option>
                    <option class="form__select-item" value="ニューヨーク">ニューヨーク</option>
                </select>
            </div>
            <div class="form__submit">
                <button type="submit" class="form__submit-btn">送信</button>
            </div>
        </form>
    </main>
</body>

</html>