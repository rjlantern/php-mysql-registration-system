<?php

$db_server = "localhost";
$db_user   = "root";
$db_pass   = "demo";
$db_name   = "practicephpdb";
$connect   = "";

try {
    $connect = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "You are not connected...";
}

// if ($connect) {
//     echo "You are connected !!!";
// }

?>