<?php
include('../conn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM blog WHERE id = $id";

    if ($conn->query($query)) {
        echo "<script>alert('Blog deleted successfully!'); window.location='admin_blog.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
