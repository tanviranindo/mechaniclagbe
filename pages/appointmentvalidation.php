<?php
session_start();

include_once "../config/dbconfig.php";

if (
    isset($_SESSION["uid"]) &&
    isset($_SESSION["first_name"]) &&
    isset($_SESSION["roles"])
) {
    // if (
    //     isset($_POST["name"]) &&
    //     isset($_POST["address"]) &&
    //     isset($_POST["regno"]) &&
    //     isset($_POST["engno"]) &&
    //     isset($_POST["appdate"]) &&
    //     isset($_POST["shift"]) &&
    //     isset($_POST["mechanic"])
    // ) {
    function validate($data)
    {
        echo $data;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $role = validate($_SESSION["roles"]);
    $name = validate($_POST["name"]);
    $address = validate($_POST["address"]);
    $regno = validate($_POST["regno"]);
    $engno = validate($_POST["engno"]);
    $appdate = validate($_POST["appdate"]);
    $shift = validate($_POST["shift"]);
    $mechanic = validate($_POST["mechanic"]);
    $requested = validate($_SESSION["uid"]);

    $app_data = "name=" . $name . "&address=" . $address . "&regno=" . $regno . "&engno=" . $engno . "&appdate=" . $appdate . "&shift=" . $shift . "&mechanic=" . $mechanic . "&requested=" . $requested;

    if (empty($name)) {
        header("Location: ./createappointment.php?error=Owner Name is required&$app_data");
        exit();
    } elseif (empty($address)) {
        header("Location: ./createappointment.php?error=Address is required&$app_data");
        exit();
    } elseif (empty($regno)) {
        header("Location: ./createappointment.php?error=Registration number is required&$app_data");
        exit();
    } elseif (empty($engno)) {
        header("Location: ./createappointment.php?error=Engine number is required&$app_data");
        exit();
    } elseif (empty($appdate)) {
        header("Location: ./createappointment.php?error=Date is required&$app_data");
        exit();
    } elseif (empty($shift)) {
        header("Location: ./createappointment.php?error=Shift is required&$app_data");
        exit();
    } elseif (empty($mechanic)) {
        header("Location: ./createappointment.php?error=Mechanic is required&$app_data");
        exit();
    } else {
        $sql = "SELECT * FROM appointment WHERE app_date='$appdate' AND app_time='$shift' AND mechanic_id='$mechanic';";
        $result = $conn->query($sql);
        $valuehere = '+0 hour +0 minutes +0 seconds';
        if ($shift == 1) $valuehere = '+11 hour +59 minutes +59 seconds';
        else if ($shift == 2) $valuehere = '+14 hour +59 minutes +59 seconds';
        else if ($shift == 3) $valuehere = '+17 hour +59 minutes +59 seconds';
        else if ($shift == 4) $valuehere = '+20 hour +59 minutes +59 seconds';
        $appdate2 = date("d-m-Y H:i:s", strtotime($valuehere, strtotime($appdate)));
        $date = date('d-m-Y H:i:s');

        if ($result->num_rows > 0) {
            header("Location: ./createappointment.php?error=Slot is unavailable&$app_data");
            exit();
        } else if ($appdate2 > $date) {
            // $uidn = $_SESSION["uid"];
            // $sql1 = "SELECT * FROM appointment WHERE app_date='$appdate' AND request_by='$uidn';";
            // $result1 = $conn->query($sql1);
            // if ($result1) {
            //     header("Location: ./createappointment.php?error=Already have an appointment on $appdate&$app_data");
            //     exit();
            // }
            $sql2 = "INSERT INTO appointment(app_for, app_address, reg_no, engine_no, app_date, app_time, mechanic_id, request_by, prog_status) VALUES('$name', '$address', '$regno', '$engno', '$appdate' , '$shift', '$mechanic', '$requested', '1')";
            $result2 = $conn->query($sql2);

            if ($result2 && $role == 1) {
                header("Location: ./user.php?success=Appointment has been made");
                exit();
            } else {
                header("Location: ./createappointment.php?error=Error occurred&$app_data");
                exit();
            }
        } else {
            header("Location: ./createappointment.php?error=Date Expired&$app_data");
            exit();
        }
    }
}
//     else {
//         header(
//             "Location: ./createappointment.php?error=Incomplete information&$app_data"
//         );
//         exit();
//     }
// }
else {
    header("Location: ./createappointment.php?error=Error occurred&$app_data");
    exit();
}
