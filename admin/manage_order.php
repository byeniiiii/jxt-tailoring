<?php
session_start();

// Initialize order session
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [];
}

// Generate a random 5-character alphanumeric Order No
function generateOrderNo() {
    return strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 5));
}

// Add new order
if (isset($_POST['add_order'])) {
    $orderNo = generateOrderNo();
    $customerName = $_POST['customer_name'];
    $orderType = $_POST['order_type'];
    $contactNumber = $_POST['contact_number'];
    $completionDate = $_POST['completion_date'];

    if (!empty($customerName) && !empty($contactNumber) && !empty($completionDate)) {
        $_SESSION['orders'][] = [
            'order_no' => $orderNo,
            'customer_name' => htmlspecialchars($customerName),
            'order_type' => htmlspecialchars($orderType),
            'contact_number' => htmlspecialchars($contactNumber),
            'completion_date' => htmlspecialchars($completionDate)
        ];
    }
}

// Reject an order
if (isset($_GET['reject'])) {
    $index = $_GET['reject'];
    unset($_SESSION['orders'][$index]);
    $_SESSION['orders'] = array_values($_SESSION['orders']);
}

// Edit an order
if (isset($_POST['edit_order'])) {
    $index = $_POST['edit_index'];
    $customerName = $_POST['customer_name'];
    $orderType = $_POST['order_type'];
    $contactNumber = $_POST['contact_number'];
    $completionDate = $_POST['completion_date'];

    $_SESSION['orders'][$index] = [
        'order_no' => $_SESSION['orders'][$index]['order_no'], // Keep the same Order No
        'customer_name' => htmlspecialchars($customerName),
        'order_type' => htmlspecialchars($orderType),
        'contact_number' => htmlspecialchars($contactNumber),
        'completion_date' => htmlspecialchars($completionDate)
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Order Management</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .form-section, .table-section {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
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

<!-- Sidebar  -->
<?php include 'includes/sidebar.php'; ?>

<!-- Main Content -->
<div class="container-fluid mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Order Management</li>
        </ol>
    </nav>

    <!-- Add/Edit Order -->
    <div class="form-section">
        <h4 id="form-title">Add New Order</h4>
        <form method="POST" action="">
            <input type="hidden" id="edit_index" name="edit_index" value="">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="customer_name" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>
                <div class="col-md-3">
                    <label for="order_type" class="form-label">Order Type</label>
                    <select class="form-select" id="order_type" name="order_type" required>
                        <option value="Sublimation">Sublimation</option>
                        <option value="Tailoring">Tailoring</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                </div>
                <div class="col-md-2">
                    <label for="completion_date" class="form-label">Estimated Completion Date</label>
                    <input type="date" class="form-control" id="completion_date" name="completion_date" required>
                </div>
                <div class="col-md-12 d-grid">
                    <button type="submit" id="form-button" name="add_order" class="btn btn-warning mt-3">Add Order</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Order List -->
    <div class="table-section mt-4">
        <h4>Order List</h4>
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Order No</th>
                    <th>Customer Name</th>
                    <th>Order Type</th>
                    <th>Contact Number</th>
                    <th>Estimated Completion Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_SESSION['orders'])): ?>
                    <?php foreach ($_SESSION['orders'] as $index => $order): ?>
                        <tr>
                            <td><?= $order['order_no'] ?></td>
                            <td><?= $order['customer_name'] ?></td>
                            <td><?= $order['order_type'] ?></td>
                            <td><?= $order['contact_number'] ?></td>
                            <td><?= $order['completion_date'] ?></td>
                            <td>
                                <button 
                                    class="btn btn-primary btn-sm" 
                                    onclick="editOrder(<?= $index ?>, '<?= addslashes($order['customer_name']) ?>', '<?= $order['order_type'] ?>', '<?= $order['contact_number'] ?>', '<?= $order['completion_date'] ?>')">Edit</button>
                                <a href="?reject=<?= $index ?>" class="btn btn-danger btn-sm">Reject</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No orders added yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>

<script>
function editOrder(index, customerName, orderType, contactNumber, completionDate) {
    document.getElementById('edit_index').value = index;
    document.getElementById('customer_name').value = customerName;
    document.getElementById('order_type').value = orderType;
    document.getElementById('contact_number').value = contactNumber;
    document.getElementById('completion_date').value = completionDate;

    document.getElementById('form-title').textContent = 'Edit Order';
    document.getElementById('form-button').textContent = 'Save Changes';
    document.getElementById('form-button').setAttribute('name', 'edit_order');
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
