<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.astronomyapi.com/api/v2/studio/moon-phase',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "format": "png",
    "style": {
        "moonStyle": "default",
        "backgroundStyle": "stars",
        "backgroundColor": "white",
        "headingColor": "white",
        "textColor": "white"
    },
    "observer": {
        "latitude": -27.4705,
        "longitude": 153.0260,
        "date": "2022-08-15"
    },
    "view": {
        "type": "portrait-simple",
        "orientation": "south-up"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic ZWMyZjdhODYtYzA4Mi00ZDkzLTk1M2EtZDU5NDA2N2RjZjQwOmNjNDU3Y2ExNWE4MDI0OTg0ZTljMGVjMmY3MjRkMDkxNGJhNThhMjAwZmU1OWU3ODU1MzhlY2M0ZTM2OTQ5MTRmOGQ4Zjk4NGI5ZTY4NmIyYWJjODBmOTVmMmMxMTYyYjlmZTEzMjVmNWMyYjQ2Y2U1ZTc4ODRiYTMzYjQwNjc5Y2JiZmZiOGQ4YjI3MTIyM2EzNTYzZmVmYTk1NzFkMGViNmQ2Zjc0ODI4ZmU5MjQ2ZTc1Mjk0YTlhNTMxM2E3MTk3OTA1NzI4Y2UyMzA2ZGJkYTFlNDkzZjhlZTY5YjEx',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


echo $response;

// $recordimage = $response['data'][0];

// echo $recordimage



?>

<?php
date_default_timezone_set('Australia/Brisbane');
echo date('d-m-Y Th:i');
?>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "park";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT parkName FROM park";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Name: ". $row["parkName"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<?php
echo date('dd-mm-yyy hh:ii a')
?>