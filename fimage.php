<?php

$data = file_get_contents('flipcart.html');

$image =  '/<img class="s-image"(.*?)/';
preg_match_all($image, $data, $f);
echo "hiiii";
echo "<pre>";
print_r($f);

echo "hello";
