<?php
include('../admin/header.php'); 
include('../conn.php'); // Database connection

// ✅ Get Navbar ID from URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM navbar WHERE id = $id");
    $row = $result->fetch_assoc();
}

// ✅ Handle Navbar Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $link = $_POST['link'];
    $status = $_POST['status'];

    // ✅ Update the Navbar in Database
    $query = "UPDATE navbar SET name='$name', link='$link', status='$status' WHERE id=$id";

    if ($conn->query($query)) {
        echo "<script>alert('Navbar link updated successfully!'); window.location='navbar_links.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center text-primary">Edit Navbar Link</h2>

    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Update Navbar Link</h4>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Menu Name</label>
                <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Menu Link</label>
                <input type="text" class="form-control" name="link" value="<?= htmlspecialchars($row['link']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" name="status" required>
                    <option value="active" <?= $row['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                    <option value="inactive" <?= $row['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100">Update Navbar Link</button>
        </form>
    </div>
</div>

<?php include('../admin/footer.php'); ?>
