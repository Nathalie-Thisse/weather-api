<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.stormglass.io/v2/tide/extremes/point?lat=43.48434839760639&lng=-1.5704093079664192",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => ["Authorization: b03d9ba4-0a6b-11ec-8904-0242ac130002-b03d9c30-0a6b-11ec-8904-0242ac130002"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$response = json_decode($response, true);
    echo '<pre>';var_dump($response);echo '<pre>';
}

// Display home's template
include 'index.phtml';