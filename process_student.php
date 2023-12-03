<!-- process_student.php -->

<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $class_id = $_POST["class_id"];

    // Gunakan prepared statement untuk mencegah SQL injection
    $query = $db->prepare("INSERT INTO students (name, class_id) VALUES (?, ?)");

    if (!$query) {
        die("Query preparation failed: " . $db->error);
    }

    $query->bind_param("si", $name, $class_id);

    if (!$query->execute()) {
        die("Query execution failed: " . $db->error);
    }

    $query->close();

    header("Location: index.php");
    exit();
}

$db->close();
?>