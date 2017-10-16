<?php
//header('Content-Type: application/json');
/*
//http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus
$ch = curl_init('http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus'); //setup the request, you can also use CURLOPT_URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Returns the data/output as a string instead of raw data
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); //Set your auth headers
curl_setopt($ch, CURLOPT_POSTFIELDS,"couleur=all&tissage=all&motif=all");
$data = curl_exec($ch); // get stringified data/output. See CURLOPT_RETURNTRANSFER
$info = curl_getinfo($ch); // get info about the request
curl_close($ch); // close curl resource to free up system resources 
//encode output
$output = json_decode($data, true); //var_dump($output);
echo $output;
*/
/*
header('Content-Type: application/json; charset=utf-8');
$url = 'http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus';
$data = array('couleur' => 'all', 'tissage' => 'all', 'motif' => 'all');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$output = json_decode($result,true);
echo $output;
//var_dump($output);

if ($result === FALSE) { echo 'error'; }


var_dump($result);
*/


//header('Content-Type: application/json');
$ch = curl_init('http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus'); //setup the request, you can also use CURLOPT_URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Returns the data/output as a string instead of raw data
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); //Set your auth headers
curl_setopt($ch, CURLOPT_POSTFIELDS,"couleur=all&tissage=all&motif=all");
$data = curl_exec($ch); // get stringified data/output. See CURLOPT_RETURNTRANSFER
$info = curl_getinfo($ch); // get info about the request
curl_close($ch); // close curl resource to free up system resources 
//encode output
//$output = json_decode($data, true); //var_dump($output);
echo $output;
var_dump($output);
?>