<?php
function connect()
{
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "David012@";
    $db_db = "db_employee";

    $mysql = @new mysqli(
        $db_host,
        $db_user,
        $db_password,
        $db_db
    );
    if ($mysql->connect_error) {
        echo "Erron: " . $mysql->connect_errno;
        echo "<br/>";
        echo "Error: " . $mysql->connect_error;
        exit();
    }
    return $mysql;
}
