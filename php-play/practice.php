<?php

class Candy
{
    // プロパティ定義 クラス内で定義された変数
    private string $flavor;
    private bool $hasSugar;
    private int $calorie;

    // インスタンス作成時に実行される関数 プロパティにそのまま代入
    public function __construct(string $flavor, bool $hasSugar, int $calorie)
    {
        $this->flavor = $flavor;
        $this->hasSugar = $hasSugar;
        $this->calorie = $calorie;
    }

    public function getFlavor():string
    {
        return $this->flavor;
    }

    public function getHasSugar(): bool
    {
        return $this->hasSugar;
    }

    public function getCalorie():int
    {
        return $this->calorie;
    }

    public function setCalorie(int $newCalories): void
    {
        $this->calorie = $newCalories;
    }

    public function isHealthy(): bool
    {
        return $this->calorie < 80;
    }

    public function addSugar(): bool
    {
        return $this->hasSugar = 1;
    }

    public function totalCalorie(): int
    {
        return $this->calorie * 5;
    }

}

$strawberryCandy = new Candy('strawberry', true, 100);
$lemonCandy = new Candy('lemon', false, 50);
$vanillaCandy = new Candy('vanilla', true, 220);

// echo $strawberryCandy->getCalorie();
// echo $strawberryCandy->setCalorie(500);
// echo $strawberryCandy->getCalorie();

// var_dump($lemonCandy->isHealthy());
// echo $lemonCandy->isHealthy();

var_dump($lemonCandy->getHasSugar());
var_dump($lemonCandy->addSugar());
echo $strawberryCandy->totalCalorie();
