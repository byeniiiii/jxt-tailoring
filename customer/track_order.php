<?php
session_start();

// Example placeholder data for orders (replace with database queries in production)
$orders = [
    'A1B2C' => ['status' => 'In Progress', 'details' => 'Your jersey is being printed.'],
    'D3E4F' => ['status' => 'Completed', 'details' => 'Your jersey is ready for pickup.'],
    'G5H6I' => ['status' => 'Pending', 'details' => 'Order received, processing soon.']
];

// Search for an order if Order No is submitted
$statusMessage = '';
if (isset($_POST['order_no'])) {
    $orderNo = strtoupper(trim($_POST['order_no']));
    if (array_key_exists($orderNo, $orders)) {
        $statusMessage = "Status: {$orders[$orderNo]['status']} - {$orders[$orderNo]['details']}";
    } else {
        $statusMessage = "Order No '{$orderNo}' not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Track Your Order</h2>
        <form method="POST" action="" class="mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <label for="order_no" class="form-label">Enter Your Order No:</label>
                    <input type="text" id="order_no" name="order_no" class="form-control" placeholder="e.g., A1B2C" required>
                </div>
                <div class="col-md-2 mt-4 mt-md-0">
                    <button type="submit" class="btn btn-warning w-100">Track</button>
                </div>
            </div>
        </form>

        <?php if (!empty($statusMessage)): ?>
            <div class="alert alert-info text-center mt-4">
                <?= htmlspecialchars($statusMessage); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
