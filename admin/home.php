<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <title>JXT Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">


</head>
<body>

<!-- Burger Menu Button -->
<nav class="navbar navbar-light bg-light">
    <button class="btn btn-outline" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="home.php">
    <img src="images/2.png" alt="Clickable Image" style="width: 50px; height: auto; padding: 8px;" />
</a>
</nav>

<!-- Sidebar  -->
<?php include 'includes/sidebar.php'; ?>

<!-- Main Content -->
<div class="container-fluid mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol><br>
    </nav>
    <div class="row">
        <!-- Cards Section -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-dark">
                <div class="card-body">Total Customers</div>
                <p class="card-footer text-center" style="color: orange; font-size: 2rem;">1,200</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-dark">
                <div class="card-body">Total Orders</div>
                <p class="card-footer text-center" style="color: orange; font-size: 2rem;">850</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-dark">
                <div class="card-body">Monthly Income</div>
                <p class="card-footer text-center" style="color: orange; font-size: 2rem;">₱50,000</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-dark">
                <div class="card-body">Monthly Expenses</div>
                <p class="card-footer text-center" style="color: orange; font-size: 2rem;">₱30,000</p>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">Monthly Sales</div>
                <div class="card-body">
                    <canvas id="areaChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">Monthly Revenue</div>
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js Script -->
<script>
    // Area Chart
    const areaCtx = document.getElementById('areaChart').getContext('2d');
    new Chart(areaCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Monthly Sales',
                data: [10000, 15000, 12000, 18000, 20000, 22000, 25000],
                backgroundColor: 'rgba(255, 165, 0, 0.2)', // Light orange fill
                borderColor: 'rgba(255, 165, 0, 1)', // Orange line
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Bar Chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Revenue',
                data: [5000, 10000, 7500, 15000, 12500, 20000],
                backgroundColor: 'rgba(255, 165, 0, 0.5)', // Semi-transparent orange for bars
                borderColor: 'rgba(255, 165, 0, 1)', // Orange border
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>


<?php include 'includes/footer.php';?>

<style>
    * {
        font-family: 'Poppins', sans-serif;
    }  
</style>

</body>
</html>
