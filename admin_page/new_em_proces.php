<?php
session_start();
$check = $_SESSION['Login'];
if ($check != 1) {
    header("location: ../Form/login.php");
}
include("../connect/connect.php");
$conn = connect();
$fist_name = $_GET["first_name"];
$last_name = $_GET["last_name"];
$sex = $_GET["sex"];
$telephone = $_GET["tel"];
$email = $_GET["email"];
$dob = $_GET["dob"];
$address = $_GET["address"];
$dec = $_GET["des"];
$active = $_GET["active"];
if ($active == "on") {
    echo $status = 1;
} else {
    echo $status = 0;
}
$str1 = "insert into db_employee.employee_table values(null,
'$fist_name', '$last_name', '$sex', '$telephone', '$email', '$dob', '$address', '$dec', $status)";
$result = mysqli_query($conn, $str1);
if ($result === true) {
    echo "Data Add Success";
    header("Location: home.php");
} else {
    echo "Insert Error You fail";
}
