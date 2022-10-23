<?php

    require "phpController.php";

    // $recordImage = load_moon();

    date_default_timezone_set('Australia/Brisbane');
    echo date('Y-m-d');
    // "date": "2022-08-15"


    echo "
    <p>wtf<p>
    <figure class='result'>
    <img src='" . $recordImage . "'>
    </figure>";

?>

<?php
// date_default_timezone_set('Australia/Brisbane');
// echo date('d-m-Y Th:i');
?>

<?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "park";

// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT parkName FROM park";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         echo "<br> Name: ". $row["parkName"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }

// $conn->close();
?>

