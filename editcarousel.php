<?php
include('../conn.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM carousel WHERE id=$id");
    $carousel = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title_home = $_POST['title_home'];
    $description_home = $_POST['description_home'];
    $button_home=$_POST['button_home'];
    $link_home=$_POST['link_home'];

    // Image Upload Handling
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "image/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        // Move uploaded file to target folder
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Update query with new image
            $update_sql = "UPDATE carousel SET 
                            title_home='$title_home', 
                            description_home='$description_home',button_home=$button_home,link_home=$link_home,
                            image='$target_file' 
                            WHERE id=$id";
        } else {
            echo "<script>alert('Failed to upload new image!');</script>";
        }
    } else {
        // Update query without changing the image
        $update_sql = "UPDATE carousel SET 
                        title_home='$title_home', 
                        description_home='$description_home',button_home='$button_home',link_home='$link_home'
                        WHERE id=$id";
    }

    // Execute update query
    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Slide updated successfully!'); window.location='insertcarousel.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<?php 
     include('../admin/header.php');
?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">  <!-- Responsive width -->
            <div class="card p-4 shadow">
                <h3 class="text-center mb-4">Edit Slide</h3>
                
                <!-- Form Start -->
                <form method="POST" enctype="multipart/form-data">
                    
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title_home" value="<?= $carousel['title_home'] ?>" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" name="description_home" rows="3" required>
        <?= isset($carousel['description_home']) ? htmlspecialchars($carousel['description_home']) : '' ?>
    </textarea>
</div>

<div class="mb-3">
    <label class="form-label">Button Text</label>
    <input type="text" class="form-control" name="button_home" 
           value="<?= isset($carousel['button_home']) ? htmlspecialchars($carousel['button_home']) : '' ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Button Link</label>
    <input type="text" class="form-control" name="link_home" 
           value="<?= isset($carousel['link_home']) ? htmlspecialchars($carousel['link_home']) : '' ?>" required>
</div>

                  

                    <!-- Existing Image Preview -->
                    <div class="mb-3 text-center">
                        <label class="form-label d-block">Current Image</label>
                        <img src="<?= $carousel['image'] ?>" class="img-fluid rounded" width="150">
                    </div>

                    <!-- Upload New Image -->
                    <div class="mb-3">
                        <label class="form-label">Upload New Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Update Slide</button>
                    </div>
                </form>
                <!-- Form End -->

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional for features like form validation) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php 
include('../admin/footer.php');
?>