<!DOCTYPE html>

<?php
session_start();
include_once "../config/dbconfig.php";

if (isset($_SESSION["uid"]) && isset($_SESSION["first_name"]) && isset($_SESSION["roles"]) && $_SESSION["roles"] == 1) { ?>
    <html xmlns="https://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <title>Create Appointment | mechaniclagbe</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        $roles = $_SESSION["roles"];
                        if ($roles == 1) { ?>
                            <li><a href="./user.php">View Appointment</a></li>
                        <?php } elseif ($roles == 2) { ?>
                            <li><a href="./mechanic.php">View Appointment</a></li>
                        <?php }
                        ?>
                        <li><a style="color: #f6cf57" href="./createappointment.php">Create Appointment</a></li>
                        <li><a href="./logout.php"><?php echo $_SESSION["first_name"]; ?>, Logout</a></li>
                    </ul>
            </div>
        </div>
        <div style="padding-top: 100px;"></div>
        <div class="formbg-extended">
            <div class=" padding-horizontal--48">
                <span class="padding-bottom--15" style="text-align: center;">Create Appointment</span>
                <form action="./appointmentvalidation.php" method="POST">
                    <div class="two-cols">
                        <div class="field padding-bottom--24">
                            <label>Name</label>
                            <?php if (isset($_GET["name"])) { ?>
                                <input type="text" name="name" placeholder="Enter your name" value="<?php echo $_GET["name"]; ?>">
                            <?php } else { ?>
                                <input type="text" name="name" placeholder="Enter your name" />
                            <?php } ?>
                        </div>
                        <div class="field padding-bottom--24">
                            <label>Address</label>
                            <?php if (isset($_GET["address"])) { ?>
                                <input type="text" name="address" placeholder="Enter your address" value="<?php echo $_GET["address"]; ?>" />
                            <?php } else { ?>
                                <input type="text" name="address" placeholder="Enter your address" />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="two-cols">
                        <div class="field padding-bottom--24">
                            <label>Registration No</label>
                            <?php if (isset($_GET["regno"])) { ?>
                                <input type="text" name="regno" placeholder="eg. DHAKA XX-XXXX" value="<?php echo $_GET["regno"]; ?>" />
                            <?php } else { ?>
                                <input type="text" name="regno" placeholder="eg. DHAKA XX-XXXX" />
                            <?php } ?>
                        </div>
                        <div class="field padding-bottom--24">
                            <label>Engine No</label>
                            <?php if (isset($_GET["regno"])) { ?>
                                <input type="text" name="engno" placeholder="eg. NZ XXXXXX" value="<?php echo $_GET["engno"]; ?>" />
                            <?php } else { ?>
                                <input type="text" name="engno" placeholder="eg. NZ XXXXXX" />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="two-cols">
                        <div class="field padding-bottom--24">
                            <label>Date</label>
                            <?php if (isset($_GET["appdate"])) { ?>
                                <input type="date" name="appdate" placeholder="Prefer date" value="<?php echo $_GET["appdate"]; ?>" />
                            <?php } else { ?>
                                <input type="date" name="appdate" placeholder="Prefer date" />
                            <?php } ?>
                        </div>

                        <div class="field padding-bottom--24">
                            <label class="form-label">Shift</label>

                            <select class="input-form-select" name="shift">
                                <option disabled="disabled" selected="selected" value="0">Select</option>

                                <?php if (isset($_GET["shift"])) { ?>
                                    <option <?php if ($_GET["shift"] == 1) echo 'selected="selected"'; ?> value="1">Morning (09:00AM)</option>
                                    <option <?php if ($_GET["shift"] == 2) echo 'selected="selected"'; ?> value="2">Noon (12:00PM)</option>
                                    <option <?php if ($_GET["shift"] == 3) echo 'selected="selected"'; ?> value="3">Afternoon (03:00PM)</option>
                                    <option <?php if ($_GET["shift"] == 4) echo 'selected="selected"'; ?> value="4">Evening (06:00PM)</option>
                                <?php } else { ?>
                                    <option value="1">Morning (09:00AM)</option>
                                    <option value="2">Noon (12:00PM)</option>
                                    <option value="3">Afternoon (03:00PM)</option>
                                    <option value="4">Evening (06:00PM)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="two-cols">
                        <div class="field padding-bottom--36">
                            <label class="form-label">Mechanic</label>
                            <?php
                            $listofmechanic = "SELECT * FROM mechanic;";
                            if ($result = $conn->query($listofmechanic)) {
                                if ($result->num_rows > 0) { ?>
                                    <select class="input-form-select" name="mechanic">
                                        <option disabled="disabled" selected="selected" value="0">Select</option>
                                        <?php if (isset($_GET["mechanic"])) {
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                                <option <?php if ($_GET["mechanic"] == $row["mechanic_id"]) {
                                                            echo 'selected="selected"';
                                                        } ?> value="<?php echo $row["mechanic_id"]; ?>"><?php echo $row["mechanic_name"]; ?></option>
                                            <?php
                                            } ?>

                                        <?php
                                        } else { ?>
                                            <?php while ($row = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $row["mechanic_id"] . ">" . $row["mechanic_name"] . "</option>";
                                            } ?>
                                        <?php } ?>
                                    </select>
                                <?php } else {
                                ?>
                                    <option disabled="disabled" selected="selected" value="0">No mechanic available</option>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="padding-bottom--36"></div>
                    </div>
                    <div class="horizontal-center field" style="width: 20%;">
                        <input type="submit" name="submit" value="Create Appointment">
                    </div>
                    <div class="padding-bottom--36"></div>

                    <?php
                    if (isset($_GET["error"])) { ?>
                        <p class="error"><?php echo "<script> alert(\"" . $_GET["error"] . "\"); </script>"; ?></p>
                    <?php }
                    if (isset($_GET["success"])) { ?>
                        <p class="success"><?php echo "<script> alert(\"" . $_GET["success"] . "\"); </script>"; ?></p>
                    <?php }
                    ?>
                </form>
            </div>
        </div>
        <br>

    <?php } else {
    header("Location: ./index.php");
    exit();
}
    ?>
    <div class="scrollToTop-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <script src="../js/script.js" type="text/javascript"></script>
    </body>

    </html>