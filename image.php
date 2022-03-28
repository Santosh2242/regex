<?php

$data = file_get_contents('https://www.amazon.in/s?k=fan&crid=MQ83VVZZ2F0O&sprefix=fan%2Caps%2C1397&ref=nb_sb_noss_1');
$name = '/<span class="a-size-medium a-color-base a-text-normal"\>(.*?)<\/span>/';
$price = '/<span class="a-price-whole"\>(.*?)<\/span>/';
$rating = '/<span class="a-icon-alt"\>(.*?)<\/span>/';
$image = '/ src="(.*?)"/';
//print_r($data);
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

$result = array();
for ($i = 0; $i < 21; $i++) {

    $a['Name'] = $cars[0][0][$i];
    $b['Price'] = $cars[1][0][$i];
    $c['Rating'] = $cars[2][0][$i];
    $d['URL'] = $cars[3][0][$i];
    print_r($a);
    print_r($b);
    print_r($c);
    print_r($d);
    $result[] = $a;
}
