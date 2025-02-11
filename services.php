<?php 
     include('../admin/header.php');
?>
<?php 
include('../conn.php'); // Include database connection
?>
<!-- // Insert new residence -->

<?php
// Include database connection
?>

<div class="container mt-5">
    <h1 class="text-center text-primary">Add New Property</h1>

    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Property Details</h4>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $location = isset($_POST['location']) ? trim($_POST['location']) : '';
            $size = isset($_POST['size']) ? trim($_POST['size']) : '';
            $length = isset($_POST['length']) ? trim($_POST['length']) : '';
            $price = isset($_POST['price']) ? trim($_POST['price']) : '';
            $buttonname = isset($_POST['buttonname']) ? trim($_POST['buttonname']) : '';

            // ✅ Check if an image is uploaded
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                $target_dir = "image/";
                $image_name = basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $image_name;

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // ✅ Correct SQL Query
                    $query = "INSERT INTO services_ (title, image, location, size, length, price, buttonname) 
                              VALUES ('$title', '$target_file', '$location', '$size', '$length', '$price', '$buttonname')";

                    if ($conn->query($query) === TRUE) {
                        echo "<script>alert('Property added successfully!'); window.location='services_php';</script>";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                } else {
                    echo "<script>alert('Failed to upload image!');</script>";
                }
            } else {
                echo "<script>alert('Please select an image to upload!');</script>";
            }
        }
        ?>

        <!-- ✅ Property Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" name="location" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Size (e.g., 8x8)</label>
                <input type="text" class="form-control" name="size" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Length (e.g., 500 sq ft)</label>
                <input type="text" class="form-control" name="length" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price ($)</label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Button Name</label>
                <input type="text" class="form-control" name="buttonname" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Add Property</button>
        </form>
    </div>
</div>







<!-- disaply data  -->

<div class="container mt-5">
    <h2 class="text-center text-primary">Property Listings</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Location</th>
                <th>Size</th>
                <th>Length SQ</th>
                <th>Price</th>
                <th>Button</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ✅ Fetch all properties from the database
            $result = $conn->query("SELECT * FROM services_ ORDER BY created_at DESC");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><img src="<?= $row['image'] ?>" width="100"></td>>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['location']) ?></td>
                        <td><?= htmlspecialchars($row['size']) ?></td>
                        <td><?= htmlspecialchars($row['length']) ?></td>
                        <td>$<?= number_format($row['price'], 2) ?></td>
                        <td><?= htmlspecialchars($row['buttonname']) ?></td>
                        <td>
                            <a href="services_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="services_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this property?');">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "<tr><td colspan='9' class='text-center'>No properties found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('../admin/footer.php'); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include('../admin/footer.php'); ?>
