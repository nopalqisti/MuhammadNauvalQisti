<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbnamme = 'db_sewamusik';

$conn = mysqli_connect($hostname, $username, $password, $dbnamme) or die ('Gagal terhubung ke database');
?>