<?php
ini_set('display_errors', 0);
$data = file_get_contents('data.html');

$length = '/data-a-html-content="(.*?)"/';
$urls = '/<option value=".*?,(.*?)">/';
$color = '/<img.*?alt="(.*?)".*>/';
$product_url = '/(?:dp|o|gp|-)\/(B[0-9]{2}[0-9A-Z]{7}|[0-9]{9}(?:X|[0-9]))/';
$rating = '/<span class="a-icon-alt">(.*?)<\/span>/';
$name = '/<span id="productTitle" class="a-size-large product-title-word-break">(.*?) <\/span>/';
$rating = '/<span class="a-icon-alt">(.*?)<\/span>/';
$price = '/<span aria-hidden="true">(.*?)<\/span>/';
$size = '/<span class="a-size-base">(.*?)<\/span>/';

preg_match_all($size, $data, $s);
echo "<pre>";
$length = $s[0][1];

preg_match_all($product_url, $data, $p);
echo "<pre>";
//print_r($p);
preg_match_all($length, $data, $a);
preg_match_all($urls, $data, $b);
preg_match_all($color, $data, $c);

echo "<pre>";


//length
$l = implode(' ', $a[1]);
//print_r($l);
echo "<br>";
//color 
$colorArr = [];
for ($i = 5; $i < 10; $i++) {
    if ($i == 7) {
        continue;
    }
    $colorArr[] = $c[1][$i];
}

//print_r($colorArr);

//product url


$newArr = array();
$urlArr = [];

foreach ($p[0] as $inputArrayItem) {
    foreach ($newArr as $outputArrayItem) {
        if ($inputArrayItem == $outputArrayItem) {
            continue 2;
        }
    }
    $newArr[] =  $inputArrayItem;
}
echo '<pre>';
for ($i = 2; $i <= 5; $i++) {
    $url = "https://www.amazon.com/" . $newArr[$i];

    $urlArr[] = $url;
}
//print_r($urlArr);

///Product Review

preg_match_all($rating, $data, $r);

$ratingArr = [];
for ($i = 0; $i < 4; $i++) {
    $ratingArr[] = $r[0][$i];
}
//print_r($ratingArr);


///Product name

preg_match_all($name, $data, $n);


$n = trim($n[1][0], " ");

//product price

preg_match_all($price, $data, $p);

$df = [];
for ($i = 0; $i < 3; $i++) {
    $df[] = explode('$', $p[0][$i]);
}

$dg = [];
for ($i = 0; $i < 3; $i++) {
    $dg[] = $df[$i][1];
}

//print_r($dg);

//print_r($p[1]);


$cars = array(
    array($n),
    array($ratingArr),
    array($urlArr),
    array($dg),
    array($colorArr),
    array($length)
);

//print_r($cars);

$result = [];

for ($i = 0; $i < 4; $i++) {
    $y['name'] = trim($cars[0][0], " ");
    $y['Rating'] = $cars[1][0][$i];
    $y['url'] = $cars[2][0][$i];
    $y['price'] = $cars[3][0][$i];
    $y['color'] = $cars[4][0][$i];
    $y['length'] = $cars[5][0];
    $result[] = $y;
}
print_r($result);
