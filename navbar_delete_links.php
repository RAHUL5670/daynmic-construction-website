<?php
include('../conn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM navbar WHERE id = $id";

    if ($conn->query($query)) {
        echo "<script>alert('Navbar link deleted successfully!'); window.location='navbar_links.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
