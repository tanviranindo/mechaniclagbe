<?php
session_start();

include_once "../config/dbconfig.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);

    if (empty($email)) {
        header("Location: ./login.php?error=Email is required");
        exit();
    } elseif (empty($password)) {
        header("Location: ./login.php?error=Password is required");
        exit();
    } else {
        // hashing the password
        $hash_password = md5($password);

        $sql = "SELECT * FROM `client` WHERE email='$email' AND hash_password='$hash_password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row["email"] == $email && $row["hash_password"] == $hash_password) {
                $role_type = $row["role_type"];
                $_SESSION["uid"] = $row["id"];
                $_SESSION["first_name"] = $row["first_name"];
                $_SESSION["last_name"] = $row["last_name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["roles"] = $role_type;
                $_SESSION["loggedin"] = true;

                if ($role_type == 1) {
                    header("Location: ./user.php");
                    exit();
                } elseif ($role_type == 2) {
                    header("Location: ./mechanic.php");
                    exit();
                }
                // header("Location: ../index.php");
                // exit();
            } else {
                header("Location: ./login.php?error=Incorrect credentials");
                exit();
            }
        } else {
            header("Location: ./login.php?error=Incorrect credentials");
            exit();
        }
    }
} else {
    header("Location: ./login.php");
    exit();
}

