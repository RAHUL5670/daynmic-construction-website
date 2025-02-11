<?php 
include('../admin/header.php'); 
include('../conn.php'); // Database connection
?>

<div class="container mt-5">
    <h2 class="text-center text-primary">Add Team Member</h2>

    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Team Member Details</h4>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $role = trim($_POST['role']);
            $description = trim($_POST['description']);

            // ✅ Handle Image Upload
            $target_dir = "image/";
            $image_name = basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $image_name;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // ✅ Insert into database
                $query = "INSERT INTO team (name, role, description, image) 
                          VALUES ('$name', '$role', '$description', '$target_file')";

                if ($conn->query($query) === TRUE) {
                    echo "<script>alert('Team member added successfully!'); window.location='admin_team.php';</script>";
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "<script>alert('Failed to upload image!');</script>";
            }
        }
        ?>

        <!-- ✅ Team Form -->
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" name="role" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Add Team Member</button>
        </form>
    </div>
</div>



<div class="container mt-5">
    <h2 class="text-center text-primary">Team Members</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Role</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ✅ Fetch all team members from the database
            $result = $conn->query("SELECT * FROM team ");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><img src="<?= $row['image'] ?>" width="100"></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['role']) ?></td>
                        <td><?= htmlspecialchars(substr($row['description'], 0, 50)) ?>...</td>
                        <td>
                            <a href="admin_edit_team.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="_admin_delete_team.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?');">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No team members found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('../admin/footer.php'); ?>

