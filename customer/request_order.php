<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/png">
    <title>JXT Tailoring</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #EDEDED;
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
        .section {
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="container text-center my-5">
        <h1 class="mb-3">Welcome to JXT Tailoring Services</h1>
        <p class="mb-4">We specialize in providing top-notch services for sublimation and tailoring. Explore our offerings below.</p>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row g-4">
            <!-- Sublimation Section -->
            <div class="col-lg-6">
                <div class="section">
                    <h2 class="text-center mb-4">Sublimation Services</h2>
                    <ul class="list-unstyled">
                        <li>- Jersey Printing</li>
                        <li>- Customized Designs</li>
                        <li>- Team Uniforms</li>
                        <li>- Sportswear Sublimation</li>
                    </ul>
                    <div class="text-center mt-3">
                        <a href="sublimation_order.php" class="btn btn-warning">Request</a>
                    </div>
                </div>
            </div>

            <!-- Tailoring Section -->
            <div class="col-lg-6">
                <div class="section">
                    <h2 class="text-center mb-4">Tailoring Services</h2>
                    <ul class="list-unstyled">
                        <li>- Alterations and Repairs</li>
                        <li>- Custom Fit Clothing</li>
                        <li>- Formal Attire</li>
                        <li>- Casual Wear</li>
                    </ul>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-warning">Request</a>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br><br>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
