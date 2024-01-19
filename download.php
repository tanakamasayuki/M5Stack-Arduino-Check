<?php

ini_set('memory_limit', '512M');

$file = file_get_contents("https://m5stack.oss-cn-shenzhen.aliyuncs.com/resource/arduino/package_m5stack_index.json");

$data = json_decode($file, true);

$url = $data['packages'][0]['platforms'][0]['url'];
echo "Download $url\n";

$file = file_get_contents($url);

file_put_contents(basename($url), $file);
