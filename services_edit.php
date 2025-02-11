<?php
include('../conn.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM services_ WHERE id = $id");
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $size = $_POST['size'];
    $length = $_POST['length'];
    $price = $_POST['price'];
    $buttonname = $_POST['buttonname'];

    $query = "UPDATE services_ SET title='$title', location='$location', size='$size', length='$length', price='$price', buttonname='$buttonname' WHERE id=$id";

    if ($conn->query($query)) {
        echo "<script>alert('Property updated successfully!'); window.location='services.php';</script>";
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

<!-- ✅ Edit Property Form -->

<div class="container mt-5">
    <h2 class="text-center text-primary">Edit Property</h2>
    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Update Property Details</h4>
        
        <!-- ✅ Responsive Edit Property Form -->
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($row['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" name="location" value="<?= htmlspecialchars($row['location']); ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Size (e.g., 8x8)</label>
                    <input type="text" class="form-control" name="size" value="<?= htmlspecialchars($row['size']); ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Length (e.g., 500 sq ft)</label>
                    <input type="text" class="form-control" name="length" value="<?= htmlspecialchars($row['length']); ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($row['price']); ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Button Name</label>
                    <input type="text" class="form-control" name="buttonname" value="<?= htmlspecialchars($row['buttonname']); ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100">Update Property</button>
        </form>
    </div>
</div>


<?php 
     include('../admin/footer.php');
?>






