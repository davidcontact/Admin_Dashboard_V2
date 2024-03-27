<?php
include("main.php");
include("../connect/connect.php");
$conn = connect();
// check if they log in they can use is they not it will auto switch to login page
session_start();
if ($_SESSION['User'] != true) {
    header("location: ../Form/login.php");
} else {
}

?>
<!-- <a href="userPage.php"></a> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .container {
            width: 100%;
            display: flex;
            background-color: rgb(218, 218, 218);
            flex-direction: column;
            align-items: center;
        }

        .container header {
            display: flex;
            /* position: fixed; */
            background-color: rgb(218, 218, 218);
            border-bottom: 1px solid black;
            width: 95%;
            padding: 15px;
            align-items: center;
            justify-content: space-between;
        }

        .container header h4 {
            font-family: sans-serif;
            display: flex;
            align-items: center;
            font-size: 20px;
            margin-left: 20px;
        }

        .container header a {
            font-family: sans-serif;
            text-decoration: none;
            font-weight: bold;
            color: black;
            font-size: 14px;
            margin-right: 30px;
            border-radius: 5px;
            border: 2px solid black;
            padding: 5px 10px;
        }

        .container header a:hover {
            background-color: black;
            color: white;
            transition: all 0.3s ease;
        }

        .container .section {
            height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container .section h4 {
            font-family: sans-serif;
            font-size: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <?php
            $email = $_SESSION["User"];
            $sql = "select * from db_employee.login_table where user_name = '$email'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $user = $row["user_name"];
            ?>
            <h4><?php echo $user ?></h4>
            <a href="logout.php">Log Out</a>
        </header>
        <div class="section">
            <h4>Coming soon...</h4>
        </div>
    </div>
</body>

</html>