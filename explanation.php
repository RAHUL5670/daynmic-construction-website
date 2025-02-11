<section id="home">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        
        <?php
        include('admin/conn.php'); // Connect to the database

        $query = "SELECT * FROM carousel"; // Fetch all slides
        $result = $conn->query($query);
        $numSlides = $result->num_rows; // Get total slides
        ?>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <?php for ($i = 0; $i < $numSlides; $i++) { ?>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></button>
            <?php } ?>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <?php 
            $first = true; // To mark the first slide as active
            while ($row = $result->fetch_assoc()) { ?>
                <div class="carousel-item <?= $first ? 'active' : '' ?>">
                    <img src="admin/<?= $row['image'] ?>" class="d-block w-100" alt="Slide Image">
                    <div class="carousel-caption">
                        <h1 class="fw-bold"><?= $row['title_home'] ?></h1>
                        <p class="lead"><?= $row['description_home'] ?></p>
                        <a href="#" class="btn hero-btn mt-3">Explore More</a>
                    </div>
                </div>
            <?php 
                $first = false; // Only first slide is active, others are not
            } ?>
        </div>

        <!-- Navigation Arrows -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</section>



📌 Explanation (How it Works)
Fetch Data from Database

include('admin/conn.php'); → Connects to database.
$query = "SELECT * FROM carousel"; → Fetches all slides.
$result = $conn->query($query); → Runs the query.
$numSlides = $result->num_rows; → Counts the number of slides.
Create Carousel Indicators (Dots)

The first dot is active, the rest are inactive.
Display Carousel Items Dynamically

The first image gets active class, making it visible first.
All images are loaded from the database (image/home1.jpg, image/home2.jpg, etc.).
Navigation Arrows

Allows the user to move between slides.
📸 Expected Output (With 3 Images)
This will display a Bootstrap carousel with three slides, each having: ✅ Image (loaded from the database)
✅ Title (title_home from the database)
✅ Description (description_home from the database)

🚀 Why This Works for Any Number of Images
✔ Fully dynamic → Works for 3 images or any number of images.
✔ No need to manually add slides → It auto-generates based on your database.
✔ Bootstrap ensures smooth transitions.

Let me know if you need more help! 😊


✅ How It Works
php
Copy
Edit
<?php for ($i = 0; $i < $numSlides; $i++) { ?>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></button>
<?php } ?>
$numSlides → Stores the total number of slides in the database.
for ($i = 0; $i < $numSlides; $i++) → Loops through and generates a button for each slide.
data-bs-slide-to="<?= $i ?>" → Each button corresponds to a slide (0, 1, 2, etc.).
class="<?= $i == 0 ? 'active' : '' ?>" → The first indicator ($i == 0) is set as active, so the first slide is displayed initially.
🎯 Example Scenario
If your carousel table has 3 slides, $numSlides = 3, so the loop generates:

html
Copy
Edit
<button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
<button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
<button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
The first button (slide-to="0") has class="active".
Clicking an indicator moves the carousel to that slide.
