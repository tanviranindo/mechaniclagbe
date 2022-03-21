<?php
$sql = "SELECT * FROM appointment;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $appid = $row["app_id"];
        $appointment_date = $row["app_date"];
        $shift = $row["app_time"];

        date_default_timezone_set('Asia/Dhaka');

        $shift1 = strtotime('+9 hours', strtotime($appointment_date));
        $shift2 = strtotime('+12 hours', strtotime($appointment_date));
        $shift3 = strtotime('+15 hours', strtotime($appointment_date));
        $shift4 = strtotime('+18 hours', strtotime($appointment_date));
        $shift5 = strtotime('+21 hours', strtotime($appointment_date));

        $today_date = strtotime('+0 hours', strtotime(date('d-m-Y h:i:s')));

        $appointedquery = "UPDATE appointment SET prog_status='1' WHERE app_id='$appid'";
        $inservicequery = "UPDATE appointment SET prog_status='2' WHERE app_id='$appid'";
        $duequery = "UPDATE appointment SET prog_status='4' WHERE app_id='$appid'";

        if ($row['prog_status'] != 3) {
            if ($shift == 1) {
                if ($shift1 < $today_date && $shift2 > $today_date) {
                    //In Service
                    $updateresult = $conn->query($inservicequery);
                } else if ($shift2 < $today_date) {
                    //DUE QUERY
                    $updateresult = $conn->query($duequery);
                } else {
                    //For default
                    $updateresult = $conn->query($appointedquery);
                }
            } else if ($shift == 2) {
                if ($shift2 < $today_date && $shift3 > $today_date) {
                    //IN SERVICE QUERY
                    $updateresult = $conn->query($inservicequery);
                } else if ($shift3 < $today_date) {
                    //DUE QUERY
                    $updateresult = $conn->query($duequery);
                } else {
                    //For default
                    $updateresult = $conn->query($appointedquery);
                }
            } else if ($shift == 3) {
                if ($shift3 < $today_date && $shift4 > $today_date) {
                    //IN SERVICE QUERY
                    $updateresult = $conn->query($inservicequery);
                } else if ($shift4 < $today_date) {
                    //DUE QUERY
                    $updateresult = $conn->query($duequery);
                } else {
                    //For default
                    $updateresult = $conn->query($appointedquery);
                }
            } else if ($shift == 4) {
                if ($shift4 < $today_date && $shift5 > $today_date) {
                    //IN SERVICE QUERY
                    $updateresult = $conn->query($inservicequery);
                } else if ($shift4 < $today_date && $shift5 < $today_date) {
                    //DUE QUERY
                    $updateresult = $conn->query($duequery);
                } else {
                    //For default
                    $updateresult = $conn->query($appointedquery);
                }
            }
        }
    }
}
