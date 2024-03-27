<?php
include("../connect/connect.php");
$cf_pwd = "";
$Error = "";
if (isset($_POST["submit"])) {
    $conn = connect();
    $email = $_POST["Email"];
    $pwd = $_POST["Password"];
    $cfPwd = $_POST["cf_pwd"];
    if ($pwd == $cfPwd) {
        $pw_secure = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "insert into db_employee.login_table values(null, '$email', '$pw_secure', '1', current_time(), current_date())";
        $result = mysqli_query($conn, $sql);
        if ($result == true) {
            header("location: login.php");
        } else {
            $Error = "Something wrong please try again!";
        }
    } else {
        $cf_pwd = "Your password is not the same!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="form.css">

</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="form.css">
    </head>

    <body>
        <div class="container">
            <form action="" method="post">
                <div class="txt-head">
                    <h4>Register Form</h4>
                    <span><?php echo $Error ?></span>
                </div>
                <div class="form-input">
                    <label for="Email">Email</label>
                    <input type="Email" name="Email" required placeholder="Example@gmail.com">
                </div>
                <div class="form-input">
                    <label for="Password">Password</label>
                    <input type="Password" name="Password" required placeholder="xxx-xxx-xxx">
                </div>
                <div class="form-input">
                    <label for="cf_pwd">Confirm Password</label>
                    <input type="Password" name="cf_pwd" required placeholder="xxx-xxx-xxx">
                    <span><?php echo $cf_pwd ?></span>
                </div>
                <div class="activate">
                    <label for="activate">
                        <input type="checkbox" name="activate" required>Remember Me
                    </label>
                </div>
                <div class="form-input">
                    <input type="submit" class="submit" name="submit" value="Create Account">
                </div>
                <div class="form-input">
                    <div>
                        <h4>Already have an account? <a href="login.php">Log In!</a></h4>
                    </div>
                </div>
            </form>
        </div>
    </body>

    </html>
</body>

</html>