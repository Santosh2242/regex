<?php

$data = file_get_contents('data.html');
$name = '/<span class="a-size-medium a-color-base a-text-normal"\>(.*?)<\/span>/';
$price = '/<span class="a-price-whole"\>(.*?)<\/span>/';
$rating = '/<span class="a-icon-alt"\>(.*?)<\/span>/';
$image = '/src="(.*?)"/';
//print_r($<img[^>]data);
$n = preg_match_all($name, $data, $b);
//$rating = trim($b[1]);
//echo $rating;
$p = preg_match_all($price, $data, $c);
$r = preg_match_all($rating, $data, $d);
$i = preg_match_all($image, $data, $e);
echo "<pre>";
//print_r($c);



$cars = array(
    array($b[0]),
    array($c[0]),
    array($d[0]),
    array($e[0])
);
/*
// Single array
$result = array();
for ($i = 0; $i < 21; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $a = $cars[$j][0][$i];
        $result[] = $a;
    }
}
print_r($result);
*/

/*
for ($i = 0; $i < 22; $i++) {
    for ($j = 0; $j < 4; $j++) {
        echo "<pre>";
        $a =  $cars[$j][0][$i];
        print_r($a);
    }
}*/

$name = [];

for ($i = 0; $i < 22; $i++) {
    echo "<pre>";
    $y['name'] =  $cars[0][0][$i];
    $y['price'] =  $cars[1][0][$i];
    $y['rating'] =  $cars[2][0][$i];
    $y['url'] =  $cars[3][0][$i];
    $name[] = $y;
}

print_r($name);
