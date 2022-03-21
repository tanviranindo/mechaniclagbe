<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<?php
if (!isset($_POST["first_name"])) { ?>

    <head>
        <title>Login | mechaniclagbe</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
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
                    <li><a style="color: #f6cf57" href="#">Login</a></li>
                    <li><a href="./signup.php">Register</a></li>
                </ul>
            </div>
        </div>

        <div class="box-root flex-flex flex-direction--column" style="padding-top:100px">
            <div class="formbg">
                <div class="padding-horizontal--48">
                    <span class="padding-bottom--15" style="text-align: center;">Sign in to your account</span>
                    <form action="./loginvalidation.php" method="POST">
                        <div class="field padding-bottom--24">
                            <div class="grid--50-50">
                                <label for="email">Email</label>
                            </div>
                            <input type="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="field padding-bottom--24">
                            <div class="grid--50-50">
                                <label for="password">Password</label>
                            </div>
                            <input type="password" name="password" id="password" placeholder="Enter your password" />
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                        </div>

                        <div class="field padding-bottom--24">
                            <input type="submit" name="submit" value="Login">
                        </div>
                        <?php
                        if (isset($_GET["error"])) { ?>
                            <p class="error"><?php echo "<script> alert(\"" . $_GET["error"] . "\"); </script>"; ?></p>
                        <?php } else if (isset($_GET["success"])) { ?>
                            <p class="success"><?php echo "<script> alert(\"" . $_GET["success"] . "\"); </script>"; ?></p>
                        <?php }
                        ?>
                    </form>
                </div>
            </div>
            <div class="footer-link padding-top--24">
                <span style="font-size: medium;">Don't have an account?
                    <a class="linked-text" href="./signup.php">Sign up</a></span>
            </div>
        </div>
        <div class="scrollToTop-btn">
            <i class="fas fa-angle-up"></i>
        </div>
        <script src="../js/script.js" type="text/javascript"></script>
    </body>

<?php }
?>

</html>