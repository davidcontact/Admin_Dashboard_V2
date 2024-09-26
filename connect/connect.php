<?php
function connect()
{
    $db_host = "";
    $db_user = "";
    $db_password = "";
    $db_db = "";

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
