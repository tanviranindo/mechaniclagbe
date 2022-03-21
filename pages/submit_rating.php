<?php

session_start();

include_once "../config/dbconfig.php";

if (isset($_POST["rating_data"])) {

    $data = $_POST["rating_data"];

    $query = "UPDATE appointment SET rating=$data WHERE app_id='38'";

    $updateresult = $conn->query($query);

    echo "Your Rating Successfully Submitted";
}
