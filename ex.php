<?php

$data = file_get_contents('data.html');

$length = '/data-a-html-content="(.*?)"/';
$urls = '/<option value=".*?,(.*?)">/';
$color = '/<img.*?alt="(.*?)".*>/';
$price = '/(?:dp|o|gp|-)\/(B[0-9]{2}[0-9A-Z]{7}|[0-9]{9}(?:X|[0-9]))/';

preg_match_all($price, $data, $p);
echo "<pre>";
print_r($p);
preg_match_all($length, $data, $a);
preg_match_all($urls, $data, $b);
preg_match_all($color, $data, $c);

echo "<pre>";
//print_r($b[1]);
$l = implode(' ', $a[1]);
//print_r($l);

//color 
$newArr = [];
for ($i = 5; $i < 10; $i++) {
    $newArr[] = $c[1][$i];
}

print_r($newArr);




$newArr = array();

foreach ($p[0] as $inputArrayItem) {
    foreach ($newArr as $outputArrayItem) {
        if ($inputArrayItem == $outputArrayItem) {
            continue 2;
        }
    }
    $newArr[] =  $inputArrayItem;
}
echo '<pre>';
print_r($newArr);


//product price