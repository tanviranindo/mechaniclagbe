<?php
$host = "sql.freedb.tech";
$username = "freedb_tanviranindo";
$password = "@TptfEUW$4UgwE9";
$db = "freedb_mechaniclagbe";
$active_group = 'default';
$query_builder = TRUE;

$conn = new mysqli($host, $username, $password, $db);

include "../pages/statusupdate.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    printf("Error : %s", mysqli_connect_error());
}

if (isset($_POST["email"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $query = "SELECT * FROM client WHERE email='" . $email . "';";
    $result = mysqli_query($conn, $query);
    echo mysqli_num_rows($result);
}

if (isset($_POST["phone"])) {
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $query = "SELECT * FROM client WHERE phone='" . $phone . "';";
    $result = mysqli_query($conn, $query);
    echo mysqli_num_rows($result);
}
