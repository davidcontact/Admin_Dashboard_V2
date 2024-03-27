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
if (isset($_GET["id"])) {
    $ID = $_GET['id'];
    $sql = "select * from db_employee.employee_table where ID = $ID";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $first = $row['first_name'];
    $last = $row['last_name'];
    $sex = $row['sex'];
    $tel = $row['tel'];
    $email = $row['email'];
    $dob = $row['dob'];
    $address = $row['address'];
    $des = $row['description'];
}
if (isset($_POST['submit'])) {
    $getID = $_POST['id'];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $sex = $_POST["sex"];
    $telephone = $_POST["tel"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $des = $_POST["des"];
    $update_sql = "update db_employee.employee_table SET first_name='$first_name',last_name='$last_name',sex='$sex',tel='$telephone',email='$email',dob='$dob',
    address='$address',description='$des',activate= 1 where ID = $getID";
    $result = mysqli_query($conn, $update_sql);
    if ($result == true) {
        header("location: home.php");
    } else {
        echo "gay";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
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
            position: fixed;
            background-color: rgb(218, 218, 218);
            border-bottom: 1px solid black;
            width: 100%;
            padding: 15px 40px;
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

        .container .update {
            background-color: cornflowerblue;
            box-shadow: 5px 5px black;
            padding: 30px;
            margin-top: 80px;
            border-radius: 10px;
            margin-bottom: 30px;
            width: 400px;
        }

        .container .update form {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;


        }

        .container .update form h4 {
            font-family: sans-serif;
            font-size: 25px;
        }

        .container .update form .form-input {
            display: flex;
            width: 100%;
            gap: 3px;
            flex-direction: column;
        }

        .container .update form .form-input label {
            font-family: sans-serif;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: 100;
        }

        .container .update form .form-input input {
            padding: 4px 8px;
            background-color: rgb(176, 176, 176);
            border-radius: 5px;
            font-family: sans-serif;
            letter-spacing: 1px;
            font-size: 13px;
            outline: none;
            border: none;
        }

        .container .update form .form-input select {
            outline: none;
            padding: 4px 5px;
            border-radius: 5px;
            background-color: rgb(176, 176, 176);
        }

        .container .update form .form-input textarea {
            padding: 4px 8px;
            background-color: rgb(176, 176, 176);
            border-radius: 5px;
            font-family: sans-serif;
            letter-spacing: 1px;
            font-size: 13px;
            outline: none;
            border: none;
        }

        .container .update form .btn {
            padding: 6px;
            font-size: 13px;
            /* height: 40px; */
            width: 100%;
            border-radius: 5px;
            margin-top: 10px;
            border: none;
            font-family: sans-serif;
            font-weight: 600;
        }

        .container .update form .btn:hover {
            background-color: black;
            transition: all 0.3s ease;
            color: white;
        }

        .container .update form .btn:active {
            scale: 0.95;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h4><a href="home.php" style="display: flex; gap: 4px; align-items: center; "><i class="fa-solid fa-backward"></i>Go Back</a> Admin Page</h4>
            <a href="logout.php">Log Out</a>
        </header>
        <div class="update">
            <form method="post">
                <h4>Profile</h4>
                <input type="hidden" name="id" value="<?php echo $ID ?>">
                <!-- first name -->
                <div class="form-input">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" value="<?php echo $first ?>">
                </div>
                <!-- last name -->
                <div class="form-input">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo $last ?>">
                </div>
                <!-- Sex -->
                <div class="form-input">
                    <label for="sex">Sex</label>
                    <select name="sex" value="<?php echo $sex ?>">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <!-- Telephone -->
                <div class="form-input">
                    <label for="tel">Tel</label>
                    <input type="tel" name="tel" value="<?php echo $tel ?>">
                </div>
                <!-- email -->
                <div class="form-input">
                    <label for="email">Email</label>
                    <input type="Email" name="email" value="<?php echo $email ?>">
                </div>
                <!-- Date Of Birth -->
                <div class="form-input">
                    <label for="dob">Date Of Birth</label>
                    <input type="date" name="dob" value="<?php echo $dob ?>">
                </div>
                <!-- Address -->
                <div class="form-input">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="<?php echo $address ?>">
                </div>
                <!-- Description -->
                <div class="form-input">
                    <label for="des">Description</label>
                    <textarea name="des" cols="30" rows="5"><?php echo $des ?></textarea>
                </div>
                <input type="submit" class="btn" name="submit" value="Update">
            </form>
        </div>
    </div>
</body>

</html>