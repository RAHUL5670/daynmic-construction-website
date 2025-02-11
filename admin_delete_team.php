<?php
include('../conn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM team WHERE id = $id";

    if ($conn->query($query)) {
        echo "<script>alert('Team member deleted successfully!'); window.location='admin_team_list.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

