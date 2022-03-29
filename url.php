<?php

$data = file_get_contents('data.html');

//print_r($data);


$url = '/(?:dp|o|gp|-)\/(B[0-9]{2}[0-9A-Z]{7}|[0-9]{9}(?:X|[0-9]))/';
$n = preg_match_all($url, $data, $b);

$newArr = array();
$a = '';

foreach ($b[0] as $inputArrayItem) {
    foreach ($newArr as $outputArrayItem) {
        if ($inputArrayItem == $outputArrayItem) {
            continue 2;
        }
    }
    $newArr[] =  $inputArrayItem;
}
echo "<pre>";
print_r($newArr);
