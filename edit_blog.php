<?php
include('../admin/header.php'); 
include('../conn.php'); // Include database connection

// ✅ Get Blog ID from URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM blogs WHERE id = $id");
    $row = $result->fetch_assoc();
}

// ✅ Handle Blog Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $published_date = $_POST['published_date'];
    $image = $row['image']; // Default to existing image

    // ✅ Check if a new image is uploaded
    if ($_FILES["image"]["name"]) {
        $target_dir = "image/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file; // Update image path
        }
    }

    // ✅ Update the Blog in Database
    $query = "UPDATE blogs SET title='$title', description='$description', published_date='$published_date', image='$image' WHERE id=$id";

    if ($conn->query($query)) {
        echo "<script>alert('Blog updated successfully!'); window.location='admin_blog_list.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center text-primary">Edit Blog</h2>

    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Update Blog Details</h4>

        <!-- ✅ Responsive Edit Blog Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Blog Title</label>
                <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($row['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" required><?= htmlspecialchars($row['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Published Date</label>
                <input type="date" class="form-control" name="published_date" value="<?= htmlspecialchars($row['published_date']); ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Current Image</label><br>
                    <img src="admin/<?= htmlspecialchars($row['image']); ?>" width="100" class="rounded">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Upload New Image (Optional)</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100">Update Blog</button>
        </form>
    </div>
</div>

<?php include('../admin/footer.php'); ?>
