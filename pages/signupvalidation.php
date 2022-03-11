<?php
session_start();

include_once "../config/dbconfig.php";

if (
    isset($_POST["firstname"]) &&
    isset($_POST["lastname"]) &&
    isset($_POST["email"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["password"]) &&
    isset($_POST["confirmpassword"])
) {
    function validate($data)
    {
        echo $data;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $firstname = validate($_POST["firstname"]);
    $lastname = validate($_POST["lastname"]);
    $email = validate($_POST["email"]);
    $phone = validate($_POST["phone"]);
    $pass = validate($_POST["password"]);
    $confirmpass = validate($_POST["confirmpassword"]);
    $role = validate($_POST["role"]);

    $user_data =
        "firstname=" .
        $firstname .
        "&lastname=" .
        $lastname .
        "&email=" .
        $email .
        "&phone=" .
        $phone .
        "&role=" .
        $role;

    if (empty($firstname)) {
        header("Location: ./signup.php?error=First Name is required&$user_data");
        exit();
    } elseif (empty($lastname)) {
        header("Location: ./signup.php?error=Last Name is required&$user_data");
        exit();
    } elseif (empty($email)) {
        header("Location: ./signup.php?error=Email is required&$user_data");
        exit();
    } elseif (empty($phone)) {
        header("Location: ./signup.php?error=Contact is required&$user_data");
        exit();
    } elseif (empty($pass)) {
        header("Location: ./signup.php?error=Password is required&$user_data");
        exit();
    } elseif ($pass !== $confirmpass) {
        header("Location: ./signup.php?error=Password does not match&$user_data");
        exit();
    } elseif (empty($role)) {
        header("Location: ./signup.php?error=Role is required&$user_data");
        exit();
    } else {
        $hash_password = md5($pass);

        $sql = "SELECT * FROM client WHERE email='$email';";
        $result = $conn->query($sql);

        $sql1 = "SELECT * FROM client WHERE phone='$phone';";
        $result1 = $conn->query($sql1);

        if ($result->num_rows > 0) {
            header(
                "Location: ./signup.php?error=Email is already in use&$user_data"
            );
            exit();
        } elseif (mysqli_num_rows($result1) > 0) {
            header(
                "Location: ./signup.php?error=Contact is already in use&$user_data"
            );
            exit();
        } else {
            $sql2 = "INSERT INTO client(first_name, last_name, email, phone, hash_password, role_type) VALUES('$firstname', '$lastname', '$email', '$phone', '$hash_password', '$role')";
            $result2 = $conn->query($sql2);
            if ($result2) {
                if ($role == 1) {
                    header(
                        "Location: ./signup.php?success=Account has been created successfully"
                    );
                    exit();
                } elseif ($role == 2) {
                    $name = $firstname . " " . $lastname;
                    $sql3 = "INSERT INTO mechanic(mechanic_name, order_count) VALUES('$name', '0')";
                    $result3 = $conn->query($sql3);
                    if ($result3) {
                        header(
                            "Location: ./signup.php?success=Account has been created successfully"
                        );
                        exit();
                    }
                }
            } else {
                header(
                    "Location: ./signup.php?error=Error occurred&$user_data"
                );
                exit();
            }
        }
    }
} else {
    header("Location: ./signup.php");
    exit();
}
