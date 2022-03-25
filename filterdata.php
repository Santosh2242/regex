<?php

$data = file_get_contents('data.html');
$name = '/<span class="a-size-medium a-color-base a-text-normal"\>(.*?)<\/span>/';
$price = '/<span class="a-price-whole"\>(.*?)<\/span>/';
$rating = '/<span class="a-icon-alt"\>(.*?)<\/span>/';
$image = '/ src="(.*?)"/';
//print_r($data);
$n = preg_match_all($name, $data, $b);
//$rating = trim($b[1]);
//echo $rating;
$p = preg_match_all($price, $data, $c, PREG_UNMATCHED_AS_NULL);
$r = preg_match_all($rating, $data, $d);
$i = preg_match_all($image, $data, $e);
/*echo "<pre>";
print_r(array_merge($b[0], $c[0]));

echo "data>";

print_r($b[0]);
print_r($c[0]);
print_r($d[0]);
print_r($e[0]);*/

$cars = array(
    array($b[0]),
    array($c[0]),
    array($d[0]),
    array($e[0])
);
echo "<pre>";
//print_r($cars);

print_r($cars[0][0][0]);
echo "<br>";
print_r($cars[1][0][0]);
echo "<br>";
print_r($cars[2][0][0]);
echo "<br>";
print_r($cars[3][0][0]);

echo "<br>";

print_r($cars[0][0][1]);
echo "<br>";
print_r($cars[1][0][1]);
echo "<br>";
print_r($cars[2][0][1]);
echo "<br>";
print_r($cars[3][0][1]);
    
/*$all = array_merge($d, $e);
foreach ($all as $ds) {
    echo "<pre>";
    print_r($ds[0]);
}


if (preg_match($name, $data, $match)) {
    echo "<pre>";
    $match = array_merge(array('lang' => '', 'qval' => ''), $match);
    print_r($match);
}
*/