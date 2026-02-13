<?php

$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$set = htmlspecialchars($_POST['radio'], ENT_QUOTES);
$count = htmlspecialchars($_POST['count'], ENT_QUOTES);

echo '私の名前は'.$name;
echo '商品の希望は'.$set.'セット';
echo '注文数'.$count;