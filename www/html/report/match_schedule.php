<?php
//$schedule = array(
//	array(0,0,0,0),
//	array()
//	);
$ch = curl_init();
// Ciicago code: ILCH &teamNumber=101
curl_setopt($ch, CURLOPT_URL, "https://www.thebluealliance.com/api/v2/event/2016wimi/matches");
//https:frc-api.firstinspires.org/v2.0/2016/schedule/CMP?tournamentLevel=tournamentLevel&teamNumber=101&start=20&end=25
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "X-TBA-App-Id: frc2062:scouting-system:v03"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);

?>
