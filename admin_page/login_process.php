<?php
session_start();
include("../connect/connect.php");
$conn = connect();
$email = $_POST["Email"];
$pwd = $_POST["Password"];
$sql = "select * from db_employee.login_table where user_name = '$email'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$email_admin = $row['user_name'];
if ($email_admin == "davidcontact119@gmail.com") {
    // password verify security 100%
    $pwd_verify = $row['password'];
    if (password_verify($pwd, $pwd_verify)) {
        $_SESSION['Email'] = $row["user_name"];
        header("location: home.php");
    } else {
        echo "Password is undefined!";
    }
} else if ($row == true) {
    // password verify security 100%
    $pwd_verify = $row['password'];
    if (password_verify($pwd, $pwd_verify)) {
        $_SESSION['User'] = $row["user_name"];
        header("location: userPage.php");
    } else {
        echo "Password is undefined!";
    }
} else {
    echo "Email is not correct!";
}
