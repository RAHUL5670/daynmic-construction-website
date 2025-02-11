<?php
include('../conn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM services_ WHERE id = $id";

    if ($conn->query($query)) {
        echo "<script>alert('Property deleted successfully!'); window.location='services.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
