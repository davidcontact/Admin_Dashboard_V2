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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- <link rel="stylesheet" href="home.css"> -->
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-color: rgb(218, 218, 218);
        }

        .main {
            display: flex;
            height: 100vh;
            justify-content: space-between;
            width: auto;
            /* padding: 55px 0px; */
        }

        .main .dashboard {
            position: fixed;
            height: 100%;
            width: 220px;
        }

        .main .dashboard div {
            display: flex;
            padding: 15px 25px;
            background-color: rgb(26, 26, 26);
            gap: 10px;
            align-items: center;
            color: white;
        }

        .main .dashboard div i {
            font-size: 20px;
            display: none;
        }

        .main .dashboard div h4 {
            font-size: 20px;
            font-family: sans-serif;
        }

        .main .dashboard .sidebar {
            background-color: rgb(36, 36, 36);
            height: 100%;
        }

        .main .dashboard .sidebar li {
            display: flex;
            gap: 10px;
        }

        .main .dashboard .sidebar li .nav-item {
            display: flex;
            padding: 13px 20px;
            font-family: sans-serif;
            text-decoration: none;
            gap: 10px;
            color: white;
            width: 100%;
        }

        .main .dashboard .sidebar li .nav-item:hover {
            background-color: rgb(46, 46, 46);
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        .main .crud {

            margin-left: 220px;
            display: flex;
            padding: 20px;
            overflow: scroll;
            flex-direction: column;
            width: 95%;
            gap: 20px;
        }

        .main .crud .topic {
            display: flex;
            /* padding-bottom: 30px; */
            /* padding: 10px 0px; */
            margin-bottom: 10px;
            border-radius: 10px;
            /* background-color: rgb(172, 172, 172); */
            flex-direction: column;
            gap: 15px;
        }

        /* .main .crud .topic .Page {
            padding: 0px 20px;
        } */

        .main .crud .topic .Page header {
            display: flex;
            align-items: center;
            border-radius: 10px;
            background-color: rgb(172, 172, 172);
            padding: 10px 10px;
            justify-content: space-between;
        }

        .main .crud .topic .Page header h4 {
            font-family: sans-serif;
            font-size: 20px;
        }

        .main .crud .topic .box-item {
            display: flex;
            /* justify-content: center ; */
            /* padding: 0px 25px; */
            gap: 30px;
            flex-wrap: nowrap;
        }

        .main .crud .topic .box-item .box {
            width: 100%;
            display: flex;
            background-color: white;
            align-items: center;
            justify-content: space-between;
            box-shadow: 5px 7px black;
            padding: 10px;
            height: 60px;
            border: 2px solid black;
            border-radius: 10px;
        }

        .main .crud .topic .box-item .box:nth-child(1) {
            background-color: rgba(10, 184, 10, 0.571);
        }

        .main .crud .topic .box-item .box:nth-child(2) {
            background-color: rgba(18, 18, 179, 0.578);
        }

        .main .crud .topic .box-item .box:nth-child(3) {
            background-color: rgba(176, 179, 18, 0.792);
        }

        .main .crud .topic .box-item .box:nth-child(4) {
            background-color: rgba(179, 18, 136, 0.591);
        }


        .main .crud .topic .box-item .box div {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .main .crud .topic .box-item .box div span {
            font-family: sans-serif;
            font-weight: bold;
            font-size: 17px;
        }

        .main .crud .topic .box-item .box div h4 {
            font-family: sans-serif;
            font-size: 12px;
            font-weight: 100;
            color: rgb(83, 82, 82);
        }

        .main .crud .topic .box-item .box h4 i {
            font-size: 25px;
        }

        .main .crud .chart {
            display: flex;
            background-color: rgb(172, 172, 172);
            justify-content: space-between;
            gap: 20px;
            border-radius: 10px;
            padding: 20px 25px;

        }

        .main .crud .chart .chart_type {
            display: flex;
            flex-direction: column;
            gap: 10px;

            width: 50%;
        }

        .main .crud .chart .chart_type h5 {
            font-family: sans-serif;
            font-size: 20px;
        }

        .main .crud .chart .chart_user {
            border: 2px solid black;
            border-radius: 10px;
            background-color: white;
            padding: 10px;
            box-shadow: 5px 7px black;
            height: 250px;

        }

        .main .crud .chart .employee {
            display: flex;
            gap: 7px;
            flex-direction: column;
            width: 50%;
        }

        .main .crud .chart .employee .developer {
            display: flex;
            justify-content: space-between;
        }

        .main .crud .chart .employee .developer h5 {
            font-family: sans-serif;
            font-size: 20px;
        }

        .main .crud .chart .employee .developer a {
            background-color: rgb(225, 225, 225);
            border-radius: 5px;
            font-size: 14px;
            font-family: sans-serif;
            color: black;
            text-decoration: none;
            padding: 5px 10px;
        }

        .main .crud .chart .employee .developer a:hover {
            background-color: rgb(40, 40, 40);
            color: white;
            transition: all 0.3s ease;
        }

        .main .crud .chart .employee .developer a:hover {
            scale: 0.95;
            transition: all 0.3s ease;
        }

        .main .crud .chart .employee .emp_list {
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            border: 2px solid black;
            padding: 10px;
            overflow-y: scroll;
            height: 250px;
            background-color: white;
            box-shadow: 5px 7px black;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .main .crud .chart .employee .emp_list div {
            display: flex;
            align-items: center;
            justify-content: center;
            /* position: relative; */
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-radius: 2px;
            padding: 2px;
        }

        .main .crud .chart .employee .emp_list div .id {
            width: 20px;
            display: flex;
            font-family: sans-serif;
            background-color: grey;
            justify-content: center;
            padding: 6px 8px;
            border-left: 2px solid black;
            /* border-right: 2px solid grey; */
        }

        .main .crud .chart .employee .emp_list div .name {
            width: 130px;
            display: flex;
            font-family: sans-serif;
            background-color: grey;
            padding: 6px 8px;
            border-left: 2px solid black;
            border-right: 2px solid black;
        }

        .main .crud .chart .employee .emp_list div .tel {
            width: 160px;
            display: flex;
            font-family: sans-serif;
            background-color: grey;
            border-right: 2px solid black;
            /* justify-content: center; */
            padding: 6px 8px;
        }

        .main .crud .chart .employee .emp_list div .option {
            width: 120px;
            display: flex;
            background-color: grey;
            gap: 5px;
            font-family: sans-serif;
            border-right: 2px solid black;
            justify-content: center;
            padding: 6px 8px;
        }

        .main .crud .chart .employee .emp_list div .option a {
            text-decoration: none;
            color: black;
        }

        .main .crud .chart .employee .emp_list div .ids {
            width: 20px;
            display: flex;
            font-weight: 100;
            justify-content: center;
            padding: 3px 8px;
        }

        .main .crud .chart .employee .emp_list div .names {
            width: 130px;
            display: flex;
            padding: 3px 8px;
            font-weight: 100;
        }

        .main .crud .chart .employee .emp_list div .tels {
            width: 160px;
            display: flex;
            font-weight: 100;
            font-size: 15px;
            /* justify-content: center; */
            padding: 3px 8px;
        }

        .main .crud .chart .employee .emp_list div .options {
            width: 120px;
            display: flex;
            font-weight: 100;
            gap: 5px;
            justify-content: center;
            padding: 3px 8px;
        }

        .main .crud .chart .employee .emp_list div .options a {
            text-decoration: none;
            font-size: 14px;
            border-radius: 3px;
            border: none;
            background-color: blue;
            font-family: sans-serif;
            padding: 3px 10px;
            color: white;
        }

        .main .crud .chart .employee .emp_list div .options a:nth-child(2) {
            background-color: red;
        }

        .main .crud .new-user {
            background-color: rgb(172, 172, 172);
            width: 95%;
            border-radius: 10px;
            padding: 20px 25px;
        }

        .main .crud .new-user h4 {
            font-family: sans-serif;
            font-size: 20px;
        }

        .main .crud .new-user .user-table {
            background-color: red;
            display: flex;
            flex-direction: column;
        }

        .main .crud .new-user .user-table .user-list {
            display: flex;
            width: 100%;
            background-color: rgb(142, 142, 142);
        }

        .main .crud .new-user .user-table .user-list:nth-child(even) {
            background-color: white;
        }

        .main .crud .new-user .user-table .user-list h4 {
            font-size: 15px;
            padding: 8px 10px;
        }

        .main .crud .new-user .user-table .user-list p {
            font-size: 13px;
            font-family: sans-serif;
            /* font-weight: bold; */
            display: flex;
            padding: 10px;
        }

        /* // //////// */
        /* // Responsive Web Design // */
        /* ////////// */
        @media only screen and (max-width: 700px) {
            .main {
                display: flex;
                width: auto;
            }

            .main .dashboard {
                position: fixed;
                height: 30vh;
                width: 100%;
            }

            .main .dashboard div {
                display: flex;
                padding: 15px 25px;
                width: 100%;
                background-color: rgb(26, 26, 26);
                gap: 10px;
                align-items: center;
                color: white;
            }

            .main .dashboard div i {
                font-size: 20px;
                display: block;
            }

            .main .dashboard .sidebar {
                display: none;
                position: fixed;
                height: 0vh;
                /* z-index: 1; */
                width: 100%;
            }

            .main .dashboard .sidebar li {
                display: flex;
                background-color: rgb(16, 16, 16);
                gap: 10px;
            }

            .main .crud {
                margin-left: 0px;
                margin-top: 45px;
                display: flex;
                padding: 20px;
                overflow: none;
                flex-direction: column;
                width: 95%;
                gap: 20px;
            }

            .main .crud .topic .box-item {
                display: flex;
                gap: 30px;
                flex-direction: column;
            }

            .main .crud .topic .box-item .box {
                width: 90%;
                display: flex;
                background-color: white;
                align-items: center;
                justify-content: space-between;
                /* box-shadow: 5px 7px black; */
                padding: 10px 20px;
                height: 60px;
                border: 2px solid black;
                border-radius: 10px;
            }

            .main .crud .chart {
                display: flex;
                flex-direction: column;
                background-color: rgba(255, 255, 255, 0);
                padding: 0px;

            }

            .main .crud .chart .chart_type {
                background-color: rgb(172, 172, 172);
                gap: 15px;
                width: 90%;
                border-radius: 10px;
                padding: 20px 25px;
            }

            .main .crud .chart .employee {
                background-color: rgb(172, 172, 172);
                gap: 15px;
                width: 90%;
                border-radius: 10px;
                padding: 20px 25px;
            }

            .main .crud .new-user {
                background-color: rgb(172, 172, 172);
                display: flex;
                flex-direction: column;
                gap: 10px;
                width: 90%;
                border-radius: 10px;
                padding: 15px 25px;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="dashboard">
            <div>
                <!-- // menu -->
                <i onclick="btnMenu()" class="fa-solid fa-bars"></i>
                <h4>Admin Page</h4>
            </div>
            <ul class="sidebar" id="sidebar">
                <li id="li"><a class="nav-item" href=""><i class="fa-solid fa-house"></i><span>Dashboard</span></a></li>
                <li id="li"><a class="nav-item" href=""><i class="fa-solid fa-list-check"></i><span>Management</span></a></li>
                <li id="li"><a class="nav-item" href=""><i class="fa-solid fa-envelope"></i><span>Messages</span></a></li>
                <li id="li"><a class="nav-item" href=""><i class="fa-solid fa-circle-info"></i><span>Help</span></a></li>
                <li id="li"><a class="nav-item" href=""><i class="fa-solid fa-gear"></i><span>Setting</span></a></li>
                <li id="li"><a class="nav-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i><span>Log Out</span></a></li>

            </ul>
        </div>
        <div class="crud">
            <div class="topic">
                <div class="Page">
                    <header>
                        <h4>Dashboard</h4>
                    </header>
                </div>

                <div class="box-item">
                    <!-- // student box -->
                    <div class="box">
                        <div>
                            <span>2,198</span>
                            <h4>Student</h4>
                        </div>
                        <h4><i class="fa-solid fa-graduation-cap"></i></h4>
                    </div>
                    <!-- // earning box -->
                    <div class="box">
                        <div>
                            <span>12,810 $</span>
                            <h4>Total Earning</h4>
                        </div>
                        <h4><i class="fa-solid fa-wallet"></i></h4>
                    </div>
                    <!-- // new user  -->
                    <div class="box">
                        <div>
                            <?php
                            $user = "select * from db_employee.login_table where active=1";
                            $result_user = $conn->query($user);
                            if ($user_total = mysqli_num_rows($result_user)) {
                                echo "<span> $user_total +</span>";
                            } else {
                                echo "<span>No User</span>";
                            }
                            ?>

                            <h4>New User</h4>
                        </div>
                        <h4><i class="fa-solid fa-user"></i></h4>
                    </div>
                    <!-- // teacher -->
                    <div class="box">
                        <div>
                            <?php
                            $user = "select * from db_employee.employee_table where activate=1";
                            $result_user = $conn->query($user);
                            if ($user_dev = mysqli_num_rows($result_user)) {
                                echo "<span> $user_dev </span>";
                            } else {
                                echo "<span>No Developer</span>";
                            }
                            ?>

                            <h4>Developer</h4>
                        </div>
                        <h4><i class="fa-solid fa-chalkboard-user"></i></h4>
                    </div>
                </div>
            </div>
            <div class="chart">
                <div class="chart_type">
                    <h5>Total Earning</h5>
                    <div class="chart_user">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="employee">
                    <div class="developer">
                        <h5>Developer List</h5>
                        <a href="New_developer.php">Add New Developer</a>
                    </div>
                    <div class="emp_list">
                        <div>
                            <h4 class="id">ID</h4>
                            <h4 class="name">Name</h4>
                            <H4 class="tel">Description</H4>
                            <h4 class="option"><a href="">Action</a></h4>
                        </div>
                        <?php
                        $sql = "select * from db_employee.employee_table where activate = 1";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <div>
                                <h4 class="ids"><?php echo $row['ID'] ?></h4>
                                <h4 class="names"><?php echo $row['first_name'] ?><?php echo ' ' ?><?php echo $row['last_name'] ?></h4>
                                <H4 class="tels"><?php echo $row['description'] ?></H4>
                                <h4 class="options"><a href="update.php?id=<?php echo $row["ID"] ?>"><i class="fa-solid fa-pen-to-square"></i></a><a href="Delete.php?id=<?php echo $row["ID"] ?>"><i class="fa-solid fa-trash"></i></a></h4>
                            </div>
                        <?php
                        }

                        ?>

                    </div>
                </div>

            </div>
            <div class="new-user">
                <h4>New User Register</h4>
                <div class="user-table">
                    <div class="user-list">
                        <h4 style="width: 30px;">ID</h4>
                        <h4 style="width: 170px;">Email</h4>
                        <h4 style="width: 130px;">TIME</h4>
                        <h4 style="width: 130px;">DATE</h4>
                    </div>
                    <?php
                    $sql = "select * from db_employee.login_table where active = 1";
                    $result = $conn->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="user-list">
                            <p style="width: 30px;"><?php echo $row['ID'] ?></p>
                            <p style="width: 170px;"><?php echo $row['user_name'] ?></p>
                            <p style="width:130px;"><?php echo $row['time_now'] ?></p>
                            <p style="width: 130px;"><?php echo $row['date_now'] ?></p>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- chart from chart.js -->
    <script>
        // Analyst Total Earning Bar
        const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Earning',
                data: [1056, 9810, 12810, 4901, 9001, 11201],
                backgroundColor: [
                    'rgba(255, 99, 132, 1.2)',
                    'rgba(255, 159, 64, 1.2)',
                    'rgba(255, 205, 86, 1.2)',
                    'rgba(75, 192, 192, 1.2)',
                    'rgba(54, 162, 235, 1.2)',
                    'rgba(153, 102, 255, 1.2)',
                    'rgba(201, 203, 207, 1.2)'
                ],
                borderColor: [
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                ],
                borderWidth: 1
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        var myChart = new Chart(
            document.getElementById("myChart"), config
        )
    </script>
    <!-- // javascript -->
    <script>
        function btnMenu() {
            const menu = document.getElementById("sidebar");
            menu.style.display = menu.style.display === "block" ? "" : "block";
        }
    </script>
</body>

</html>