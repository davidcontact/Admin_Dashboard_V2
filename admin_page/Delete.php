<?php
include("main.php");
include("../connect/connect.php");
$conn = connect();
// check if they log in they can use is they not it will auto switch to login page
session_start();
if ($_SESSION['Email'] != true) {
    header("location: ../Form/login.php");
} else {
}
$ID = $_GET["id"];
$update = "update db_employee.employee_table set activate=0 where id = $ID";
$result = mysqli_query($conn, $update);
$conn->close();
header("location: home.php");
