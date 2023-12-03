<?php
$hostname = "localhost";
$username = "root"; // Sesuaikan ini dengan username MySQL Anda
$password = "";
$db_name = "absen_dashboard";

$db = new mysqli($hostname, $username, $password, $db_name);

// Memeriksa koneksi
if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}

// Memilih database yang dibuat
$db->select_db($db_name);

?>
