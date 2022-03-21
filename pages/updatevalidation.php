<?php
session_start();

include_once "../config/dbconfig.php";

if (isset($_SESSION["uid"]) && isset($_SESSION["roles"])) {
    function validate($data)
    {
        echo $data;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST["name"]);
    $address = validate($_POST["address"]);
    $regno = validate($_POST["regno"]);
    $engno = validate($_POST["engno"]);
    $appdate = validate($_POST["appdate"]);
    $shift = validate($_POST["shift"]);
    $mechanic = validate($_POST["mechanic"]);
    $status = validate($_POST["status"]);
    $requested = validate($_SESSION["uid"]);
    $app_id = $_GET["id"];

    $app_data = "appid = " . $app_id . "&name=" . $name . "&address=" . $address . "&regno=" . $regno . "&engno=" . $engno . "&appdate=" . $appdate . "&shift=" . $shift . "&mechanic=" . $mechanic . "&status" . $status . "&requested=" . $requested;

    if (empty($name)) {
        header("Location: ./updateappointment.php?id=" . $app_id . "&error=Owner Name is required");
        exit();
    } elseif (empty($address)) {
        header("Location: ./updateappointment.php?id=" . $app_id . "&error=Address is required");
        exit();
    } elseif (empty($regno)) {
        header("Location: ./updateappointment.php?id=" . $app_id . "&error=Registration number is required");
        exit();
    } elseif (empty($engno)) {
        header("Location: ./updateappointment.php?id=" . $app_id . "&error=Engine number is required&");
        exit();
    } elseif (empty($appdate)) {
        header("Location: ./updateappointment.php?id=" . $app_id . "&error=Date is required");
        exit();
    } elseif (empty($shift)) {
        header("Location: ./updateappointment.php?id=" . $app_id . "&error=Shift is required");
        exit();
    } elseif (empty($mechanic)) {
        header("Location: ./updateappointment.php?id=" . $app_id . "&error=Mechanic is required");
        exit();
    } elseif (empty($status)) {
        header("Location: ./updateappointment.php?id=" . $app_id . "&error=Status is required");
        exit();
    } else {
        $sql = "SELECT * FROM appointment WHERE app_date='$appdate' AND app_time='$shift' AND mechanic_id='$mechanic' AND NOT app_id='$app_id';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: ./updateappointment.php?id=" . $app_id . "&error=Slot is not available&$app_data");
            exit();
        } else {
            $sqlupdate = "UPDATE appointment SET app_for='$name', app_address='$address', reg_no='$regno', engine_no='$engno', app_date='$appdate', app_time='$shift', mechanic_id='$mechanic', prog_status='$status' WHERE app_id='$app_id'";
            $updateresult = $conn->query($sqlupdate);
            if ($updateresult) {
                header("Location: ./mechanic.php?success=Appointment has been updated.");
                exit();
            } else {
                header("Location: ./updateappointment.php?id=" . $app_id . "&error=Error occurred&$app_data");
                exit();
            }
        }
    }
} else {
    header("Location: ./updateappointment.php?id=" . $app_id . "&error=Error occurred&$app_data");
    exit();
}
