<?php 
     include('../admin/header.php');
?>
<?php 
// include('../admin/header.php'); // Include header

// $conn = new mysqli('localhost', 'root', '', 'construction');

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Handle Form Submission
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $heading = isset($_POST['heading']) ? trim($_POST['heading']) : null;
//     $url = isset($_POST['url']) ? trim($_POST['url']) : null;
//     $status = isset($_POST['status']) ? trim($_POST['status']) : null;
//     $added_date = isset($_POST['added_date']) ? trim($_POST['added_date']) : date('Y-m-d');
//     $modified_date = isset($_POST['modified_date']) ? trim($_POST['modified_date']) : date('Y-m-d');

//     // Image Upload Handling
//     $target_dir = "images/";
//     $image_name = basename($_FILES["image"]["name"]);
//     $target_file = $target_dir . $image_name;

//     if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//         // Insert Data into Database
//         $stmt = $conn->prepare("INSERT INTO carousel (image, heading, url, status, added_date, modified_date) 
//                                 VALUES (?, ?, ?, ?, ?, ?)");
//         $stmt->bind_param("ssssss", $target_file, $heading, $url, $status, $added_date, $modified_date);

//         if ($stmt->execute()) {
//             echo "<script>alert('Slide added successfully!'); window.location='add_slide.php';</script>";
//         } else {
//             echo "Error: " . $stmt->error;
//         }

//         $stmt->close();
//     } else {
//         die("Error uploading image.");
//     }
// }

// $conn->close();
?>

<!-- 🖼️ Stylish Form -->
<div class="container mt-5">
    <h1 class="text-center text-primary">Add Carousel Slide</h1>
    
    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">New Slide Details</h4>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Slider Heading</label>
                <input type="text" class="form-control" name="heading" placeholder="Enter Slide Heading" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Button URL</label>
                <input type="url" class="form-control" name="url" placeholder="Enter Button Link" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" name="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

        

            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" id="imageInput" required>
                <br>
                <img id="imagePreview" src="#" class="img-thumbnail" style="display:none; width: 200px;">
            </div>

            <button type="submit" class="btn btn-success w-100">Add Slide</button>
        </form>
    </div>
</div>



    <!-- Existing Slides Table -->
    <div class="mt-4">
        <h4>Existing Slides</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Url</th>
                    <th>Added Date</th>
                    <th>Modified Date</th>
                     <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><img src="<?= $row['image'] ?>" width="100"></td>
                        <td><?= $row['heading'] ?></td>
                        <td><?= $row['url'] ?></td>
                        <td><?= $row['added_date'] ?></td>
                        <td><?= $row['modified_data'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['heading'] ?></td>
                        

                      
</a></td>
                        <td>
                            <a href="editcarousel.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="deletecarousel.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php 
     include('../admin/footer.php');
?>