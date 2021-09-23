<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "todo";

$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    echo "Koneksi gagal!";
}

?>