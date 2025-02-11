<?php
include('../admin/header.php'); 
include('../conn.php'); // Include database connection

// ✅ Get Team Member ID from URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM team WHERE id = $id");
    $row = $result->fetch_assoc();
}

// ✅ Handle Team Member Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $description = $_POST['description'];
    $image = $row['image']; // Default to existing image

    // ✅ Check if a new image is uploaded
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "image/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file; // Update image path
        }
    }

    // ✅ Update the Team Member in Database
    $query = "UPDATE team SET name='$name', role='$role', description='$description', image='$image' WHERE id=$id";

    if ($conn->query($query)) {
        echo "<script>alert('Team member updated successfully!'); window.location='admin_team.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center text-primary">Edit Team Member</h2>

    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Update Team Member Details</h4>

        <!-- ✅ Responsive Edit Team Member Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" name="role" value="<?= htmlspecialchars($row['role']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" required><?= htmlspecialchars($row['description']); ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Current Image</label><br>
                    <img src="<?= htmlspecialchars($row['image']); ?>" width="150" class="rounded" alt="Team Member Image">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Upload New Image (Optional)</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100">Update Team Member</button>
        </form>
    </div>
</div>

<?php include('../admin/footer.php'); ?>





























