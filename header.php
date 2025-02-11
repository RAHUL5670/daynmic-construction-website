<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Sidebar</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../admin/style.css">
</head>
<div class="d-flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-toggle">
            <div class="sidebar-logo">
                <a href="#">CodzSword</a>
            </div>
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav p-0">
                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Task</span>
                    </a>
                </li>
              
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="true" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>

                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#Carousel" aria-expanded="true" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Carousel</span>
                    </a>

                    <ul id="Carousel" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
    <li class="sidebar-item">
        <a href="insertcarousel.php" class="sidebar-link">Insert Carousel</a>
        <!-- <a href="insert_product.php" class="btn btn-info  my-1">Insert Product</a> -->
    </li>
    <li class="sidebar-item">
        <a href="updatecarousel.php" class="sidebar-link load-page" data-page="updatecarousel.php">Update Carousel</a>
    </li>
    <li class="sidebar-item">
        <a href="deletecarousel.php" class="sidebar-link load-page" data-page="deletecarousel.php">Delete Carousel</a>
    </li>
    <li class="sidebar-item">
        <a href="editcarousel.php" class="sidebar-link load-page" data-page="editcarousel.php">Edit Carousel</a>
    </li>
</ul>

<li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#services" aria-expanded="true" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Services</span>
                    </a>

                    <ul id="services" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="services.php" class="sidebar-link"> ADD Services</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="admin_blog.php" class="sidebar-link"> Add Blog</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="admin_team.php" class="sidebar-link">Add Team</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="navbar_logo.php" class="sidebar-link">Add Navbar</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="navbar_links.php" class="sidebar-link">Add Links</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Navigation Ends -->
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Setting</span>
                </a>
            </div>
        </aside>
        <!-- Sidebar Ends -->
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand">
                <button class="toggler-btn" type="button">
                    <i class="lni lni-text-align-left"></i>
                </button>
            </nav>
            <main class="p-3">
                <div class="container-fluid">
                    <div class="mb-3 text-center">
                        <!-- <h1>Bootstrap Sidebar Tutorial</h1> -->
                 
