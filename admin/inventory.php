<?php
session_start();

// Initialize inventory session
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = [];
}

// Generate a random 5-character alphanumeric Order No
function generateOrderNo() {
    return strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 5));
}

// Add new item
if (isset($_POST['add_item'])) {
    $orderNo = generateOrderNo();
    $item = $_POST['item'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];

    if (!empty($item) && !empty($quantity)) {
        $_SESSION['inventory'][] = [
            'order_no' => $orderNo,
            'item' => htmlspecialchars($item),
            'description' => htmlspecialchars($description),
            'quantity' => intval($quantity)
        ];
    }
}

// Delete an item
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    unset($_SESSION['inventory'][$index]);
    $_SESSION['inventory'] = array_values($_SESSION['inventory']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inventory Table</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .form-section {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }
        .table-section {
            margin-top: 20px;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            min-height: 300px;
        }
        footer {
            margin-top: 20px;
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
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

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Inventory</li>
            </ol>
        </nav>

        <!-- Section 1: Add New Item -->
        <div class="form-section">
            <h4>Add New Item</h4>
            <form method="POST" action="">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="item" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="item" name="item" required>
                    </div>
                    <div class="col-md-4">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="col-md-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>
                    <div class="col-md-3 d-grid">
                        <button type="submit" name="add_item" class="btn btn-warning mt-4">Add Item</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Section 2: Table of Items -->
        <div class="table-section">
            <h4>Inventory Items</h4>
            <table class="table table-bordered table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Order No</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($_SESSION['inventory'])): ?>
                        <?php foreach ($_SESSION['inventory'] as $index => $item): ?>
                            <tr>
                                <td><?= $item['order_no'] ?></td>
                                <td><?= $item['item'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td>
                                    <a href="?delete=<?= $index ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No items added yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
