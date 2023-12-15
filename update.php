<?php
include "koneksi.php";

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id_absen = $_POST["id"];
    $new_keterangan = $_POST["new_keterangan"];

    // Gunakan prepared statement untuk mencegah SQL injection
    $query_update = $db->prepare("UPDATE absen SET keterangan = ? WHERE id = ?");
    $query_update->bind_param("si", $new_keterangan, $id_absen);

    // Eksekusi query
    if ($query_update->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = "Error: " . $query_update->error;
    }

    $query_update->close();
} else {
    $response['success'] = false;
    $response['error'] = "Invalid request.";
}

// Memberikan respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>