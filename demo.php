<?php 
include('../conn.php');

// Fetch all carousel slides
$result = $conn->query("SELECT * FROM carousel");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title_home'];
    $description = $_POST['description_home'];
    $button_text = $_POST['button_text'];
    $button_link = $_POST['button_link'];

    // Image Upload
    $target_dir = "image/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insert new slide into the database
        $sql = "INSERT INTO carousel (title_home, description_home, button_home, link_home, image) 
                VALUES ('$title', '$description', '$button_text', '$button_link', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Slide added successfully!'); window.location='insertcarousel.php';</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image!');</script>";
    }
}
?>

<?php include('../admin/header.php'); ?>

<!-- Bootstrap 5 Styling -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h1 class="text-center text-success mb-4">Manage Carousel</h1>

    <!-- Add New Slide Form -->
    <div class="card shadow-lg p-4">
        <h4 class="text-primary mb-3">Add New Slide</h4>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title_home" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description_home" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Button Text</label>
                <input type="text" class="form-control" name="button_text" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Button Link</label>
                <input type="text" class="form-control" name="button_link" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Add Slide</button>
            </div>
        </form>
    </div>

    <!-- Existing Slides -->
    <div class="mt-5">
        <h4 class="text-primary">Existing Slides</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Button Text</th>
                        <th>Button Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><img src="<?= $row['image'] ?>" class="rounded" width="100"></td>
                            <td><?= htmlspecialchars($row['title_home']) ?></td>
                            <td><?= htmlspecialchars($row['description_home']) ?></td>
                            <td><?= htmlspecialchars($row['button_home']) ?></td>
                            <td><a href="<?= htmlspecialchars($row['link_home']) ?>" target="_blank" class="btn btn-info btn-sm">Visit</a></td>
                            <td>
                                <a href="editcarousel.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="deletecarousel.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include('../admin/footer.php'); ?>
