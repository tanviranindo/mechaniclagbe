<!DOCTYPE html>

<?php
session_start();
include_once "../config/dbconfig.php";
if (
    isset($_SESSION["uid"]) &&
    isset($_SESSION["first_name"]) &&
    isset($_SESSION["roles"]) &&
    $_SESSION["roles"] == 1
) { ?>

    <html xmlns="https://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <title>View Appointment | mechaniclagbe</title>
        <?php include "./head.php"; ?>
    </head>

    <body>
        <!-- <div class="preloader"></div> -->
        <div class="header">
            <a class="brand" href="../index.php">mechaniclagbe</a>
            <div class="menu-btn"></div>
            <div class="navigation">
                <ul>
                    <?php
                    $roles = $_SESSION["roles"];
                    if ($roles == 1) { ?>
                        <li><a style="color: #f6cf57" href="./user.php">View Appointment</a></li>
                    <?php } elseif (
                        $roles == 2
                    ) { ?> <li><a style="color: #f6cf57" href="./mechanic.php">View Appointment</a></li>
                    <?php }
                    ?>
                    <li><a href="./createappointment.php">Create Appointment</a></li>
                    <li><a href="./logout.php"><?php echo $_SESSION["first_name"]; ?>, Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="paddingtop">
            <?php
            $uid = $_SESSION["uid"];
            $sql = "SELECT * FROM appointment WHERE request_by='$uid';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) { ?>
                <div class="container table-responsive">

                    <table class="table table-hover table-bordered rounded" id="appointment_table2">

                        <!-- <div class="input-group">
                            <input class="form-control border" type="search" placeholder="Search" id="searchbox">
                        </div> -->
                        <h3 style="text-align: center;">Appointment History</h3>

                        <thead style="font-weight: 500;">
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Address</td>
                                <td>Registration</td>
                                <td>Engine</td>
                                <td>Date</td>
                                <td>Shift</td>
                                <td>Mechanic</td>
                                <td>Status</td>
                                <td style="text-align: center;">Action</td>
                            </tr>
                        </thead>

                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row["app_id"]; ?></td>
                                <td><?php echo $row["app_for"]; ?></td>
                                <td><?php echo $row["app_address"]; ?></td>
                                <td><?php echo $row["reg_no"]; ?></td>
                                <td><?php echo $row["engine_no"]; ?></td>
                                <?php $date = date_create($row["app_date"]); ?>
                                <td title=" <?php echo date_format(
                                                $date,
                                                "l"
                                            ); ?>" data-toggle="tooltip">
                                    <?php echo date_format($date, "d F, Y"); ?>
                                </td>
                                <td>
                                    <?php switch ($row["app_time"]) {
                                        case 1:
                                            echo "Morning";
                                            break;
                                        case 2:
                                            echo "Noon";
                                            break;
                                        case 3:
                                            echo "Afternoon";
                                            break;
                                        case 4:
                                            echo "Evening";
                                            break;
                                    } ?>
                                </td>
                                <td>
                                    <?php
                                    $mechanicid = $row["mechanic_id"];
                                    $listofmechanic = "SELECT * FROM mechanic WHERE mechanic_id='$mechanicid'";
                                    if ($mechlist = $conn->query($listofmechanic)) {
                                        if ($mechlist->num_rows > 0) {
                                            if ($rowsd = mysqli_fetch_array($mechlist)) {
                                                $temp1 = $rowsd["mechanic_id"];
                                                $temp2 = $rowsd["mechanic_name"];
                                                echo "$temp2";
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($row["prog_status"]) {
                                        case 1:
                                            echo "Appointed";
                                            break;
                                        case 2:
                                            echo "In Service";
                                            break;
                                        case 3:
                                            echo "Delivered";
                                            break;
                                        case 4:
                                            echo "Due";
                                            break;
                                    } ?>
                                </td>
                                <td style="text-align: center;">
                                    <!-- <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
                                    <!-- <div class="text-center"> -->
                                    <!-- <button onclick="window.print();" class="" id="print-btn">Print</button> -->
                                    <!-- </div> -->

                                    <!-- <a title="Review appointment" id="add_review" data-toggle="tooltip"><i class="fa-solid fa-star"></i></a> -->
                                    <a href="./deleteappointment.php?id=<?php echo $row["app_id"]; ?>" title="Delete appointment" onclick="return confirm('I am deleting an appointment')" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
            <?php } else { ?>
                <div class="box-root flex-flex flex-direction--column" style="padding-top:100px">
                    <div class="formbg">
                        <div class="padding-horizontal--48">
                            <h4 style="text-align: center;">No appointment found!</h4>
                            <br />
                            <button class="cstm-btn" onclick="window.location.href='./createappointment.php'">Create Appointment</button>
                        </div>
                    </div>
                </div>

            <?php }
            ?>
            <?php
            if (isset($_GET["error"])) { ?>
                <p class="error"><?php echo "<script> alert(\"" . $_GET["error"] . "\"); </script>"; ?></p>
            <?php }
            if (isset($_GET["success"])) { ?>
                <p class="success"><?php echo "<script> alert(\"" . $_GET["success"] . "\"); </script>"; ?></p>
            <?php }
            ?>
        </div>
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

    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Review</h5>
                    <i type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </i>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <div class="form-group">
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                    </div>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>