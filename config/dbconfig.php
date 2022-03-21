<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
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
