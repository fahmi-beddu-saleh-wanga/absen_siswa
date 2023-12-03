<?php
include "koneksi.php"; // Sertakan file koneksi.php yang berisi informasi kredensial

$mysqli = new mysqli($hostname, $username, $password, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_name = $_POST["class_name"];

    // Gunakan prepared statement untuk mencegah SQL injection
    $query = $mysqli->prepare("INSERT INTO classes (class_name) VALUES (?)");

    if (!$query) {
        die("Query preparation failed: " . $mysqli->error);
    }

    $query->bind_param("s", $class_name); // "s" menunjukkan tipe data string

    if (!$query->execute()) {
        die("Query execution failed: " . $mysqli->error);
    }

    $query->close();

    header("Location: index.php");
    exit();
}

$mysqli->close();
?>
