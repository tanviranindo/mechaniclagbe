<?php
session_start();

include_once "../config/dbconfig.php";

if (isset($_SESSION["roles"])) {
    $deleteid = $_GET["id"];

    $sql = "DELETE FROM appointment WHERE app_id='$deleteid'";

    if ($result = $conn->query($sql)) {
        $roles = $_SESSION["roles"];
        if ($roles == 1) {
            if ($result) {
                header("Location: ./user.php?success=Successfully deleted");
                exit();
            }
        }
        if ($roles == 2) {
            if ($result) {
                header("Location: ./mechanic.php?success=Successfully deleted");
                exit();
            }
        }
    }
}
