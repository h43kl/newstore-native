<?php

$error='';

include("api/db_config.php");

if (isset($_POST['submit'])) {
    $email   = $_POST['email'];
    $password   = $_POST['password'];


    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($query) == 0) {
        $error = "Email or Password is invalid";
    } else {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['email']=$row['email'];
        $_SESSION['level'] = $row['level'];

        if ($row['level'] == "Administrator") {
            header("Location: admin");
        } elseif ($row['level'] == "member") {
            header("Location: member");
        } else {
            $error = "Failed Login";
        }
    }
}
