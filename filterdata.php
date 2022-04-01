<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
$data = file_get_contents('data.html');

$name = '/<span id="productTitle" class="a-size-large product-title-word-break">(.*?) <\/span>/';
$rating = '/<span class="a-icon-alt">(.*?)<\/span>/';
$price = '/<span aria-hidden="true">(.*?)<\/span>/';
$size = '/<span class="a-size-base">(.*?)<\/span>/';
$imageurl = '/ (http.*\.)(jpe?g|jpg|[tg]iff?svg)/i';
$url = '/(?:dp|o|gp|-)\/(B[0-9]{2}[0-9A-Z]{7}|[0-9]{9}(?:X|[0-9]))/';
$length = '/data-a-html-content="(.*?)"/';

preg_match_all($name, $data, $a);
preg_match($rating, $data, $b);
preg_match_all($price, $data, $c);



preg_match_all($length, $data, $l);
preg_match_all($size, $data, $d);
echo "<pre>";
print_r($d[0][1]);

preg_match_all($imageurl, $data, $e);
$n = preg_match_all($url, $data, $f);

$m = implode(' ', $l[1]);

$newArr = [];
for ($i = 1; $i < 4; $i++) {
    echo "<pre>";

    $newArr[] = $d[0][$i];
}
$arr = [];
for ($i = 0; $i < 1; $i++) {
    $z['dimensions'] = $newArr[0];
    //$z['Length'] = $newArr[1];
    $z['Color'] = $newArr[2];
    $arr[] =  $z;
}




$cars = array(
    array($a[0][0]),
    array($b[0]),
    array($c[0][1]),
    array($f[0][1]),
    array($arr[0]),
    array($m)
);

//print_r($cars);

$name = [];
for ($i = 0; $i < 4; $i++) {
    echo "<pre>";
    $y['name'] = $cars[0][0];
    $y['Rating'] = $cars[1][0];
    $y['Price'] = $cars[2][0];
    $y['Product_url'] = 'https://www.amazon.com/' . $cars[3][0];
    $y['color'] = $cars[4][0];
    $y['length'] = $m;
    $name[] = $y;
}
print_r($name);
