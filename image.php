<?php

$data = file_get_contents('data.html');

$image =  '/(<span class="a-price-whole"\>(.+?)<\/span>)/';
preg_match_all($image, $data, $f, PREG_SET_ORDER);

echo "<pre>";
print_r($f[0]);
