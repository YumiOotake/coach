<?php
$a = 7;
if ($a === 5) {
    echo "\$aは5です";
} elseif ($a === 7) {
    echo "\$aは7です</br>";
}

$people = "Saburo";
switch ($people) {
    case "Saburo":
        echo "三郎です</br>";
        break;

    default:
        echo "違います";
        break;
}

// $a = 7;
// $result = $a === 7 ? "true" : "false";
// echo $result;

// for ($i=1; $i <= 5; $i++) {
//     echo $i * 2 . '<br/>';
// }

$count = 0;
// while ($count < 20) {
//     echo ++$count;
// }

// while ($count <= 100) {
//     $count+= 1;
//     if ($count % 3 === 0) {
//         continue;
//     }
//     echo $count . '<br/>';
// }

$num = 0;
// do {
//     echo $num . '<br/>';
//     $num++;
// } while ($num <= 2);

// for ($i = 1; $i <= 50; $i++) {
//     if ($i % 3 === 0 && $i % 5 === 0) {
//         echo "fizzbuzz<br/>";
//     } elseif ($i % 3 === 0) {
//         echo "fizz<br/>";
//     } elseif ($i % 5 === 0) {
//         echo "buzz<br/>";
//     } else {
//         echo  $i . "<br/>";
//     }
// }

for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        echo "◯";
    }
    echo "<br/>";
}

function number()
{
    $num = 5;
    echo $num;
};
number();

function score($score1, $score2, $score3)
{
    $total = $score1 + $score2 + $score3;
    if ($total > 210) {
        echo '合格点は' . $total . 'なので合格です<br/>';
    } else {
        echo '合格点は' . $total . 'なので不合格です<br/>';
    }
}
score(100, 100, 100);

score(1, 2, 3);

$people = array('Taro', 'Jiro', 'Saburo');
// var_dump($people);
// echo $people[0];
foreach ($people as $p => $name) {
    echo ($p + 1).'番目は'.$name.'さん<br/>';
}


$profile = [
    [
        'name' => 'Taro',
        'age' => 25,
        'female' => 'men',
    ],
    [
        'name' => 'Jiro',
        'age' => 20,
        'female' => 'men',
    ],
    [
        'name' => 'hanako',
        'age' => 16,
        'female' => 'women',
    ]
];

foreach ($profile as $p) {
    echo $p['name'].'('.$p['age'].'歳'.$p['female'].')<br/>';
}