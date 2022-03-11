<!DOCTYPE html>

<?php
session_start();
include_once "../config/dbconfig.php";

if (
    isset($_SESSION["uid"]) && isset($_SESSION["first_name"])
    && isset($_SESSION["roles"]) && $_SESSION["roles"] == 2
) { ?>
    <html xmlns="https://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <title>Update Appointment | mechaniclagbe</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <link href="../css/style.css" type="text/css" rel="stylesheet">
        <link href="../images/favicon.png" type="image/png" rel="icon">
    </head>

    <body>
        <!-- <div class="preloader"></div> -->
        <div class="header">
            <a class="brand" href="../index.php">mechaniclagbe</a>
            <div class="menu-btn"></div>
            <div class="navigation">
                <ul>
                    <ul>
                        <?php
                        if ($_SESSION["roles"] == 1) { ?>
                            <li><a href="./user.php">View Appointment</a></li>
                        <?php } elseif ($_SESSION["roles"] == 2) { ?>
                            <li><a href="./mechanic.php">View Appointment</a></li>
                        <?php }
                        ?>
                        <li><a href="./createappointment.php">Create Appointment</a></li>
                        <li><a href="./logout.php"><?php echo $_SESSION["first_name"]; ?>, Logout</a></li>
                    </ul>
            </div>
        </div>
        <div style="padding-top: 80px;"></div>
        <div class="formbg-extended">
            <div class=" padding-horizontal--48">
                <?php
                $updateid = $_GET["id"];
                $resultquery = mysqli_query($conn, "SELECT * FROM appointment WHERE app_id='$updateid';");
                if (mysqli_num_rows($resultquery) > 0) {
                    if ($row = mysqli_fetch_array($resultquery)) { ?>
                        <span class="padding-bottom--15" style="text-align: center;">Update Appointment</span>
                        <form action="./updatevalidation.php?id=<?php echo $updateid; ?>" method="POST">
                            <div class="two-cols">
                                <div class="field padding-bottom--24">
                                    <label>Name</label>
                                    <input type="text" name="name" value="<?php echo $row["app_for"]; ?>" />
                                </div>
                                <div class="field padding-bottom--24">
                                    <label>Address</label>
                                    <input type="text" name="address" value="<?php echo $row["app_address"]; ?>" />
                                </div>
                            </div>
                            <div class="two-cols">
                                <div class="field padding-bottom--24">
                                    <label>Registration No</label>
                                    <input type="text" name="regno" value="<?php echo $row["reg_no"]; ?>" />
                                </div>
                                <div class="field padding-bottom--24">
                                    <label>Engine No</label>
                                    <input type="text" name="engno" value="<?php echo $row["engine_no"]; ?>" />
                                </div>
                            </div>
                            <div class="two-cols">
                                <div class="field padding-bottom--24">
                                    <label>Date</label>
                                    <input type="date" name="appdate" value="<?php echo $row["app_date"]; ?>" />
                                </div>

                                <div class="field padding-bottom--24">
                                    <label class="form-label">Shift</label>

                                    <select class="input-form-select" name="shift">
                                        <option disabled="disabled" selected="selected" value="0">Select</option>
                                        <option <?php if ($row["app_time"] == 1) echo 'selected="selected"'; ?> value="1">Morning (09:00AM)</option>
                                        <option <?php if ($row["app_time"] == 2) echo 'selected="selected"'; ?> value="2">Noon (12:00PM)</option>
                                        <option <?php if ($row["app_time"] == 3) echo 'selected="selected"'; ?> value="3">Afternoon (03:00PM)</option>
                                        <option <?php if ($row["app_time"] == 4) echo 'selected="selected"'; ?> value="4">Evening (06:00PM)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="two-cols">
                                <div class="field padding-bottom--24">
                                    <label class="form-label">Mechanic</label>
                                    <?php
                                    $appidmechanic = "SELECT mechanic_id FROM appointment WHERE app_id='$updateid'";
                                    $listofmechanic = "SELECT * FROM mechanic";
                                    $mechid;


                                    if ($resultds = $conn->query($appidmechanic)) {
                                        if ($resultds->num_rows > 0) {
                                            while ($rowds = mysqli_fetch_array($resultds)) {
                                                $mechid = $rowds['mechanic_id'];
                                            }
                                        }
                                    }

                                    if ($result = $conn->query($listofmechanic)) {
                                        if ($result->num_rows > 0) { ?>
                                            <select class="input-form-select" name="mechanic">
                                                <option disabled="disabled" selected="selected" value="0">Select</option>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <option <?php if ($mechid == $row["mechanic_id"]) {
                                                                echo 'selected="selected"';
                                                            } ?> value="<?php echo $row["mechanic_id"]; ?>"><?php echo $row["mechanic_name"]; ?></option>
                                                <?php
                                                } ?>

                                            </select>
                                </div>
                            <?php } else {
                            ?>
                                <option disabled="disabled" selected="selected" value="0">No mechanic available</option>
                    <?php
                                        }
                                    }
                                } ?>
                    <div class="field padding-bottom--24"></div>
                            </div>

                        <?php
                    }
                        ?>
                        <div class="field padding-bottom--15">
                            <input type="submit" name="submit" value="Update">
                        </div>

                        <?php
                        if (isset($_GET["error"])) { ?>
                            <p class="error"><?php echo "<script> alert(\"" .
                                                    $_GET["error"] .
                                                    "\"); </script>"; ?></p>
                        <?php }
                        if (isset($_GET["success"])) { ?>
                            <p class="success"><?php echo "<script> alert(\"" .
                                                    $_GET["success"] .
                                                    "\"); </script>"; ?></p>
                        <?php }
                        ?>

                        </form>
            </div>
        </div>
    <?php } else {
    header("Location: ./index.php");
    exit();
}
    ?>

    <script src="../js/script.js" type="text/javascript"></script>
    </body>

    </html>