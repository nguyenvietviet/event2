<?php
function open() {  
    header("Content-type: text/html; charset=utf-8");
	$host = "localhost";
    $user = "root";
    $password = "";
    $database = "event3";
	$mysqli_connect = mysqli_connect($host, $user, $password, $database)or die("không thể kết nối tới database");
    mysqli_set_charset($mysqli_connect, 'UTF8');

    return $mysqli_connect;
}

function close($mysqli_connect) {
    mysqli_close($mysqli_connect);
}

?>