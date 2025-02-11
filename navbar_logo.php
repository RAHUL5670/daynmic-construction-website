<?php 
include('../admin/header.php'); 
include('../conn.php'); // Database connection

// ✅ Fetch existing logo
$logo_result = $conn->query("SELECT * FROM logo ORDER BY created_at DESC LIMIT 1");
$logo_row = $logo_result->fetch_assoc();

// ✅ Handle Logo Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "image/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // ✅ Insert or update the logo
            if ($logo_row) {
                $query = "UPDATE logo SET image='$target_file' WHERE id=".$logo_row['id'];
            } else {
                $query = "INSERT INTO logo (image) VALUES ('$target_file')";
            }

            if ($conn->query($query)) {
                echo "<script>alert('Logo updated successfully!'); window.location='navbar_logo.php';</script>";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center text-primary">Manage Website Logo</h2>

    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Update Logo</h4>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Current Logo</label><br>
                <?php if ($logo_row) { ?>
                    <img src="<?= htmlspecialchars($logo_row['image']); ?>" width="150" class="rounded">
                <?php } else { ?>
                    <p>No logo uploaded.</p>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload New Logo</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Update Logo</button>
        </form>
    </div>
</div>

<?php include('../admin/footer.php'); ?>



