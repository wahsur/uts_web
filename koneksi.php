<?php 
$host = 'localhost';
$user = 'root';
$password = 'bangsat123';
$db = 'db_akademik';

$kon=mysqli_connect($host, $user, $password, $db);
if (!$kon){
    die ("koneksi gagal:".mysqli_connect_error());
}

?>