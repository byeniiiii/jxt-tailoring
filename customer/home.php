<?php
// Array of designs with image URLs and design names
$designs = [
    ['img' => 'j1.jpg', 'name' => 'BlackPink Football Jersey'],
    ['img' => 'j1.jfif', 'name' => 'San Francisco Black-Yellow Jersey'],
    ['img' => 'j2.jfif', 'name' => 'Navy Blue Information Technology Jersey'],
    ['img' => 'j3.jfif', 'name' => 'NORSU BS Accountancy Jersey '],
    ['img' => 'j4.jpg', 'name' => 'Fly Emirates Football Jersey'],
    ['img' => 'j5.jpg', 'name' => 'The Raptors Esports Jersey'],
    ['img' => 'j6.png', 'name' => 'RED EXECIO Esports Jersey'],
    ['img' => 'j7.png', 'name' => 'San Jose Volleyball Jersey']
];
?>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/png">
    <title>JXT Tailoring</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }  
        body {
            background-color: #EDEDED;
        }
        .navbar {
            background-color: #FFFFFF; /* Navbar set to white */
            color: black;
        }
        .navbar .nav-link, .navbar-brand {
            color: black;
        }
        .navbar-toggler {
            border-color: black;
        }
        .navbar-toggler:focus {
            box-shadow: none;
        }
        .carousel img {
            width: 100%;
            object-fit: cover;
        }
        .search-bar {
            margin: 20px auto;
            text-align: center;
        }
        .search-bar input {
            width: 80%;
            max-width: 500px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 5px;
        }
        .search-bar button {
            padding: 10px 20px;
            background-color: #FFA500;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-bar button:hover {
            background-color: #e07b00;
        }
        .btn-warning {
            background-color: #FFA500;
            color: white;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e07b00;
            color: white;
        }
        .card img {
            max-height: 150px;
            object-fit: cover;
        }
        /* Media Query: Slide-in Navbar */
        @media (max-width: 991px) {
            .collapse:not(.show) {
                display: none;
            }
            .navbar-collapse {
                position: fixed;
                top: 0;
                right: -250px;
                width: 250px;
                height: 100%;
                background-color: #FFFFFF;
                box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
                padding-top: 50px;
                transition: right 0.3s ease;
                z-index: 1000;
            }
            .navbar-collapse.show {
                right: 0;
            }
            .navbar-nav {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Slideshow -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="b1.png" class="d-block" height="300px" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="b2.png" class="d-block w-100" height="300px" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="b3.png" class="d-block w-100" height="300px" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="b4.png" class="d-block w-100" height="300px" alt="Slide 4">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" placeholder="Search for a design...">
        <button type="button">Search</button>
    </div>

    <!-- Main Content -->
    <div class="container spacing">
        <div class="row g-4">
            <?php foreach ($designs as $design): ?>
                <div class="col-12 col-sm-4 col-lg-3">
                    <div class="card">
                        <img src="<?= $design['img']; ?>" class="card-img-top" alt="<?= $design['name']; ?>">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title"><?= $design['name']; ?></h5>
                                <a href="#" class="btn btn-warning">Choose Design</a>
                            </center>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div><br>

    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>