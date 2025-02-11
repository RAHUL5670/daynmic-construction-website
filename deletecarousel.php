<?php
$conn = new mysqli('localhost', 'root', '', 'construction');
include('./conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM carousel WHERE id=$id");
    echo "<script>alert('Slide deleted successfully!'); window.location='carousel_admin.php';</script>";
}
$conn->close();
?>
