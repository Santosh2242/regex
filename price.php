<?php

$data = file_get_contents('data.html');
//print_r($data);
$pattern = '/<span class="a-price-whole"\>(.*?)<\/span>/';
if (preg_match($pattern, $data, $b)) {
    foreach ($b as $d) {
        //echo $d;
    }
}
