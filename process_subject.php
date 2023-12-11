<?php
include "koneksi.php"; // Sertakan file koneksi.php yang berisi informasi kredensial

$mysqli = new mysqli($hostname, $username, $password, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_name = $_POST["subject_name"];

    // Gunakan prepared statement untuk mencegah SQL injection
    $query = $mysqli->prepare("INSERT INTO subjects (subject_name) VALUES (?)");

    if (!$query) {
        die("Query preparation failed: " . $mysqli->error);
    }

    $query->bind_param("s", $subject_name); // "s" menunjukkan tipe data string

    if (!$query->execute()) {
        die("Query execution failed: " . $mysqli->error);
    }

    $query->close();

    header("Location: bootstrapdashboard/home.php");
    exit();
}

$mysqli->close();
?>
