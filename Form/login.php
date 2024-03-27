<?php
include("../connect/connect.php");


?>
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
        <form method="post" action="../admin_page/login_process.php">
            <div class="txt-head">
                <h4>Log In Form</h4>
            </div>
            <div class="form-input">
                <label for="Email">Email</label>
                <input type="Email" name="Email" placeholder="Example@gmail.com">
            </div>
            <div class="form-input">
                <label for="Password">Password</label>
                <input type="Password" name="Password" placeholder="xxx-xxx-xxx">

            </div>
            <div class="activate">
                <label for="activate">
                    <input type="checkbox" name="activate" required>Remember Me
                </label>
            </div>
            <div class="form-input">
                <input type="submit" class="submit" value="Log In">
            </div>
            <div class="form-input">
                <div>
                    <h4>Don't have an account? <a href="Register.php">Register Here!</a></h4>
                </div>
            </div>
        </form>
    </div>
</body>

</html>