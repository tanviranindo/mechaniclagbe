<!DOCTYPE html>

<?php
session_start();
$roles = 0;
$loggedin = false;
$redirect = "./pages/login.php";
if (isset($_SESSION["loggedin"]) && isset($_SESSION["roles"])) {
    $loggedin = true;
    $redirect = "./pages/createappointment.php";
    $roles = $_SESSION["roles"];
}
?>
<html>

<html xmlns="https://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
    <title>mechaniclagbe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script src="./js/jquery.js" type="text/javascript"></script>
    <link href="./css/style.css" type="text/css" rel="stylesheet">
    <link href="./images/favicon.png" type="image/png" rel="icon">
</head>

<body>
    <!-- <div class="preloader"></div> -->
    <div class="header">
        <a class="brand" href="./index.php">mechaniclagbe</a>
        <div class="menu-btn"></div>
        <div class="navigation removeli">
            <?php if ($loggedin) { ?>
                <ul>
                    <?php if ($roles == 1) { ?>
                        <li><a href="./pages/user.php">View Appointment</a></li>
                    <?php } elseif (
                        $roles == 2
                    ) { ?> <li><a href="./pages/mechanic.php">View Appointment</a></li>
                    <?php } ?>
                    <li><a href="./pages/createappointment.php">Create Appointment</a></li>
                    <li>
                        <a href="./pages/logout.php">
                            <?php
                            $var = $_SESSION["first_name"];
                            echo "$var";
                            ?>, Logout
                        </a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul>
                    <li><a href="./pages/login.php">Login</a></li>
                    <li><a href="./pages/signup.php">Register</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>


    <div class="box-root flex-flex flex-direction--column" style="padding-top: 100px; position: sticky;">
        <div class="formbg">
            <div class="padding-horizontal--48" style="text-align: center;">
                <?php if ($roles == 2) { ?>
                    <img src="./images/run.gif" height="200px" width="200px" alt="Mechanic">
                    <h1 class="padding-bottom--24">Hello, <?php echo $_SESSION["first_name"]; ?></h1>
                    <span class="padding-bottom--15">Check for any pending appointment</span>
                    <button class="cstm-btn" onclick="window.location.href='./pages/mechanic.php'">View Appointment</button>
                <?php } else { ?>
                    <img src="./images/service.gif" height="200px" width="140px" alt="Service">
                    <h1 class="padding-bottom--24">Hello, Car Enthusiast</h1>
                    <span class="padding-bottom--15">What's wrong with your car?</span>
                    <button class="cstm-btn" onclick="window.location.href='<?php echo $redirect; ?>'">Create Appointment</button>
                <?php } ?>

            </div>
        </div>
    </div>

    <?php include "./pages/footer.php"; ?>

    <script src="./js/script.js" type="text/javascript"></script>
</body>

</html>