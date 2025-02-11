<?php 
include('../admin/header.php'); 
include('../conn.php'); // Database connection
?>

<div class="container mt-5">
    <h2 class="text-center text-primary">Add New Blog</h2>

    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Blog Details</h4>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $published_date = trim($_POST['published_date']);

            // ✅ Handle Image Upload
            $target_dir = "image/";
            $image_name = basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $image_name;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // ✅ Insert into database
                $query = "INSERT INTO blog (title, image, description, published_date) 
                          VALUES ('$title', '$target_file', '$description', '$published_date')";

                if ($conn->query($query) === TRUE) {
                    echo "<script>alert('Blog added successfully!'); window.location='admin_blog.php';</script>";
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "<script>alert('Failed to upload image!');</script>";
            }
        }
        ?>

        <!-- ✅ Blog Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Blog Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Published Date</label>
                <input type="date" class="form-control" name="published_date" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Add Blog</button>
        </form>
    </div>
</div>








<!-- disapl all ddat form database -->

<div class="container mt-5">
    <h2 class="text-center text-primary">Blog Listings</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Published Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $result = $conn->query("SELECT * FROM blog");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><img src="<?= $row['image'] ?>" width="100"></td>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars(substr($row['description'], 0, 50)) ?>...</td>
                        <td><?= htmlspecialchars($row['published_date']) ?></td>
                        <td>
                            <a href="edit_blog.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_blog.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No blogs found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('../admin/footer.php'); ?>


