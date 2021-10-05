<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "todo";

define('FIREBASE_API_KEY', 'AAAAJDPwDgE:APA91bF2cmoHaoi28EqNPZQ7WuZzQXGuN5crQGF-_k8hyfKQEW_9W0xI2pNyT1AfZ2rNVQYh37x6mDpzQZ93A_WXbUi7m2gi6_EeJ5cfoTzqe2NfP304VmFfHva_A-pfOkwk5EpVS-wl');

$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    echo "Koneksi gagal!";
}

?>