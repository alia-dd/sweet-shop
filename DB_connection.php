<?php

$sname= "localhost:3306";

$unmae= "root";

$password = "";

$db_name = "sweets_shop";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}?>

<?php

// $sname = "localhost";
// $uname = "root";
// $password = "";
// $db_name = "sweets_shop";

// $conn = new mysqli($sname, $uname, $password, $db_name);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }



?>