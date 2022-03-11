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
<html lang="en">

<head>
    <title>Error | mechaniclagbe</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../images/favicon.png" type="image/png" rel="icon">
</head>

<body>
    <div class="header">
        <a class="brand" href="../index.php">mechaniclagbe</a>
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

    <div class="centerize" id="main">
        <div class="error-page">
            <div class="error-page-404">
                <h1>Error 404</h1>
            </div>
        </div>
    </div>

</body>

</html>