<!DOCTYPE html>
<html>

<head>
    <title>Signup | mechaniclagbe</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
                <li><a href="./login.php">Login</a></li>
                <li><a style="color: #f6cf57" href="#">Register</a></li>
            </ul>
        </div>
    </div>
    <div class="box-root flex-flex flex-direction--column">
        <div class="box-root padding-top--24 flex-flex flex-direction--column">
            <div class=" padding-bottom--24 flex-flex flex-justifyContent--center" style="padding-top:40px">
            </div>
            <div class="formbg-extended">
                <div class="padding-horizontal--48">
                    <span class="padding-bottom--15" style="text-align: center;">Create your account</span>
                    <form action="./signupvalidation.php" method="POST">
                        <div class="two-cols">
                            <div class="field padding-top--24 padding-bottom--24">
                                <div class="grid--50-50">
                                    <label>First Name</label>
                                </div>
                                <?php if (isset($_GET["firstname"])) { ?>
                                    <input type="text" name="firstname" placeholder="Enter your first name" value="<?php echo $_GET["firstname"]; ?>">
                                <?php } else { ?>
                                    <input type="text" name="firstname" placeholder="Enter your first name" />
                                <?php } ?>
                            </div>
                            <div class="field padding-bottom--24">
                                <div class="grid--50-50">
                                    <label>Last Name</label>
                                </div>
                                <?php if (isset($_GET["lastname"])) { ?>
                                    <input type="text" name="lastname" placeholder="Enter your last name" value="<?php echo $_GET["lastname"]; ?>" />
                                <?php } else { ?>
                                    <input type="text" name="lastname" placeholder="Enter your last name" />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="two-cols">
                            <div class="field">
                                <div class="grid--50-50">
                                    <label>Email</label>
                                </div>
                                <?php if (isset($_GET["email"])) { ?>
                                    <input type="email" name="email" id="email" placeholder="Enter your email address" value="<?php echo $_GET["email"]; ?>" />
                                <?php } else { ?>
                                    <input type="email" name="email" id="email" placeholder="Enter your email address" />
                                <?php } ?>
                                <span id="emailValidator"><br></span>
                            </div>
                            <div class="field">
                                <div class="grid--50-50">
                                    <label>Phone</label>
                                </div>
                                <?php if (isset($_GET["phone"])) { ?>
                                    <input type="phone" name="phone" id="phone" placeholder="Enter your phone number" value="<?php echo $_GET["phone"]; ?>" />
                                <?php } else { ?>
                                    <input type="phone" name="phone" id="phone" placeholder="Enter your phone number" />
                                <?php } ?>
                                <span id="phoneValidator"><br></span>
                            </div>
                        </div>
                        <div class="two-cols">
                            <div class="field">
                                <div class="grid--50-50">
                                    <label>Password</label>
                                </div>
                                <?php if (isset($_GET["password"])) { ?>
                                    <input type="password" name="password" id="password" placeholder="Enter your password" value="<?php echo $_GET["password"]; ?>" />
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                <?php } else { ?>
                                    <input type="password" name="password" id="password" placeholder="Enter your password" />
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                <?php } ?>
                                <span><br></span>

                            </div>
                            <div class="field">
                                <div class="grid--50-50">
                                    <label>Confirm Password</label>
                                </div>
                                <?php if (isset($_GET["confirmpassword"])) { ?>
                                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Retype your password" value="<?php echo $_GET["confirmpassword"]; ?>" />
                                    <i class="bi bi-eye-slash" id="togglePassword1"></i>
                                <?php } else { ?>
                                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Retype your password" />
                                    <i class="bi bi-eye-slash" id="togglePassword1"></i>
                                <?php } ?>
                                <span id='message'><br></span>
                            </div>
                        </div>
                        <div class="two-cols">
                            <div class="field field padding-bottom--24">
                                <div class="grid--50-50">
                                    <label>Account Type</label>
                                </div>

                                <select class="input-form-select" name="role">
                                    <option disabled="disabled" selected="selected" value="0">Select</option>
                                    <?php if (isset($_GET["role"])) { ?>
                                        <option <?php if ($_GET["role"] == 1) echo 'selected="selected"'; ?> value="1">User</option>
                                        <option <?php if ($_GET["role"] == 2) echo 'selected="selected"'; ?> value="2">Mechanic</option>

                                    <?php } else { ?>
                                        <option value="1">User</option>
                                        <option value="2">Mechanic</option>
                                    <?php } ?>

                                </select>

                            </div>
                            <div class="field padding-bottom--24"></div>
                        </div>

                        <div class="horizontal-center field" style="width: 10%;">
                            <input type="submit" name="submit" id="register" value="Sign up" />
                        </div>


                        <div class="padding-bottom--15"></div>

                        <!-- <div class="field padding-bottom--15">
                            <input type="reset" name="reset" value="Reset">
                        </div> -->

                        <?php
                        if (isset($_GET["error"])) { ?>
                            <p class="error"><?php echo "<script> alert(\"" . $_GET["error"] . "\"); </script>"; ?></p>
                        <?php }
                        if (isset($_GET["success"])) { ?>
                            <p class="success">
                                <?php
                                echo "<script> 
                                alert(\"" . $_GET["success"] . "\"); 
                                window.location.href='./login.php';
                                </script>";
                                ?></p>
                        <?php }
                        ?>
                    </form>
                </div>
            </div>
            <div class="footer-link padding-top--24" style="padding-bottom: 20px;">
                <span style="font-size: medium;">Already have an account?
                    <a class="linked-text" href="./login.php">Sign in</a>
                </span>
            </div>
        </div>
    </div>
    <div class="scrollToTop-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <script src="../js/script.js" type="text/javascript"></script>
</body>

</html>