<?php
// Start session for login security (Optional)
// session_start();
// if (!isset($_SESSION['admin_logged_in'])) {
//     header("Location: login.php");
//     exit();
// }
  
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'construction');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title_home = $_POST['title_home'];
    $description_home = $_POST['description_home'];
    $button_home =$_POST['button_home'];
    $link_home = $_POST['link_home']; 
    $button_home = isset($_POST['button_home']) ? trim($_POST['button_home']) : null;
    $link_home = isset($_POST['link_home']) ? trim($_POST['link_home']) : null;
    // Ensure status is correctly received
    // $status = isset($_POST['status']) ? $_POST['status'] : 'Inactive'; 
    // Debugging: Check if values are received
    if (!$title_home || !$description_home || !$button_home || !$link_home) {
        die("Error: Missing form fields.");
    }
    // Image Upload Handling
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert Data into Database
    $sql = "INSERT INTO carousel (image, title_home, description_home, button_home,link_home) 
            VALUES ('$target_file', '$title_home', '$description_home', '$button_home', '$link_home')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Slide added successfully!'); window.location='insertcarousel.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch Existing Carousel Data
$result = $conn->query("SELECT * FROM carousel");
?>
<?php 
     include('../admin/header.php');
?>

    <!-- Main Content -->
    <div id="content" class="container">
        
        <p>Select an option from the sidebar to manage your website.</p>
    </div>
</div>
</div>


<div class="container mt-5">
<h1 class="mt-4 text-success">Add Carsoule Here</h1>
    <!-- Add Slide Form -->
    <div class="card p-4">
        <h4>Add New Slide</h4>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>title_home</label>
                <input type="text" class="form-control" name="title_home" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea class="form-control" name="description_home" required></textarea>
            </div>
            <div class="mb-3">
                <label>Button Text</label>
                <input type="text" class="form-control" name="button_home" required>
            </div>
            <div class="mb-3">
                <label>Button Link</label>
                <input type="text" class="form-control" name="link_home" required>
            </div>
            <!-- <div class="mb-3">
    <label class="form-label">Status</label>
    <select class="form-control" name="status" required>
        <option value="Active">Active</option>
        <option value="Deactive">Deactive</option>
    </select>
</div> -->


            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-success">Add Slide</button>
        </form>
    </div>

    <!-- Existing Slides Table -->
    <div class="mt-4">
        <h4>Existing Slides</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>title_home</th>
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
                        <td><img src="<?= $row['image'] ?>" width="100"></td>
                        <td><?= $row['title_home'] ?></td>
                        <td><?= $row['description_home'] ?></td>
                        <td><?= $row['button_home'] ?></td>

                        <td><a href="/<?= htmlspecialchars($row['link_home']) ?>" class="btn btn-primary mt-3">
    <?= $row['button_home'] ?>
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

<!-- // this is form data in header   -->
                </div>
            </main>
        </div>
    </div>
<body>
<?php 
include('../admin/footer.php');
?>
