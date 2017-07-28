<?php
function curl($url, $post = false)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('username' => 'setup')));
    $icerik = curl_exec($ch);
    curl_close($ch);
    return $icerik;
}

$timestamp = round(microtime(true) * 1000);

$custom_from = '2017-07-10';
$custom_to = '2017-07-24';
$post = ['range' => 'CUSTOM',
    'customFrom' => $custom_from,
    'cutomTo' => $custom_to];

$hash = md5(md5('setupad') . $timestamp);
$test = json_decode(curl('https://n2.epom.com/rest-api/analytics/JSON/setup/' . $hash . "/" . $timestamp . ".do"));
print_r($test);