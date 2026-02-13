<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="世界時計です">
    <title>Document</title>
    <link rel="stylesheet" href="./css/sanitize.css">
    <link rel="stylesheet" href="./css/common2.css">
    <link rel="stylesheet" href="./css/index2.css">
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <h1 class="header__ttl">World Clock</h1>
        </div>
    </header>
    <main>
        <div class="form__content">
            <div class="form__ttl">
                <h2 class="form__ttl-text">日本と世界の時間を比較</h2>
            </div>
            <form action="./result2.php" class="form" method="get">
                <div class="form__select">
                    <select name="city" class="form__select-list">
                        <option class="form__item" value="シドニー">シドニー</option>
                        <option class="form__item" value="上海">上海</option>
                        <option class="form__item" value="モスクワ">モスクワ</option>
                        <option class="form__item" value="ロンドン">ロンドン</option>
                        <option class="form__item" value="ヨハネスブルグ">ヨハネスブルグ</option>
                        <option class="form__item" value="ニューヨーク">ニューヨーク</option>
                    </select>
                </div>
                <div class="form__submit">
                    <button type="submit" class="form__submit-btn">送信</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>