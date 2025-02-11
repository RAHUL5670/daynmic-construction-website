<?php 
include('../admin/header.php'); 
include('../conn.php'); // Database connection

// ✅ Fetch existing logo
$logo_result = $conn->query("SELECT * FROM logo ORDER BY created_at DESC LIMIT 1");
$logo_row = $logo_result->fetch_assoc();



// ✅ Handle Navbar Link Insertion
if (isset($_POST['add_navbar'])) {
    $name = trim($_POST['name']);
    $link = trim($_POST['link']);
    $status = trim($_POST['status']);

    $query = "INSERT INTO navbar (name, link, status) VALUES ('$name', '$link', '$status')";
    
    if ($conn->query($query)) {
        echo "<script>alert('Navbar link added successfully!'); window.location='navbar_links.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>



    <!-- ✅ Manage Navbar Section -->
    <div class="card shadow-lg p-4 mt-3">
        <h4 class="text-success">Add Navbar Link</h4>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Menu Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Menu Link (e.g., #services, #team, #contact)</label>
                <input type="text" class="form-control" name="link" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" name="status" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" name="add_navbar" class="btn btn-success w-100">Add Navbar Link</button>
        </form>
    </div>

    <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Link</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM navbar");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['link']) ?></td>
                        <td>
                            <span class="badge <?= $row['status'] == 'active' ? 'bg-success' : 'bg-danger' ?>">
                                <?= ucfirst($row['status']); ?>
                            </span>
                        </td>
                        <td>
                            <a href="navbar_edit_links.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="navbar_links.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this menu?');">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No navbar links found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include('../admin/footer.php'); ?>
