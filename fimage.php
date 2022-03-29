<?php

$data = file_get_contents('data.html');

$image =  '/src="(.*?)"/';
preg_match_all($image, $data, $f);
echo "hiiii";
echo "<pre>";
print_r($f);

echo "hello";
