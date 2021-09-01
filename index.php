<?php

//get tides info from stormglass api: https://docs.stormglass.io/#/tide
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.stormglass.io/v2/tide/extremes/point?lat=43.48479325298032&lng=-1.5724396074444238",
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


//get moon info from WeatherAPI via Rapid API: https://rapidapi.com/weatherapi/api/weatherapi-com/
$curl2 = curl_init();

curl_setopt_array($curl2, [
	CURLOPT_URL => "https://weatherapi-com.p.rapidapi.com/astronomy.json?q=biarritz",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: weatherapi-com.p.rapidapi.com",
		"x-rapidapi-key: 4d2d990d55mshf5d3427a8f7ee93p109cfbjsn58b2d5054348"
	],
]);

$response2 = curl_exec($curl2);
$err2 = curl_error($curl2);

curl_close($curl2);

if ($err2) {
	echo "cURL Error #:" . $err2;
} else {
	$response2 = json_decode($response2, true);
    echo '<pre>';var_dump($response2);echo '<pre>';
}

// Display home's template
include 'index.phtml';