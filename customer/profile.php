<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Include the database connection file
include '../database.php';

// Fetch user data from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM customers WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $customer = $result->fetch_assoc();
} else {
    echo "No customer found.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $customer['password'];

    $sql = "UPDATE customers SET first_name='$first_name', last_name='$last_name', contact_number='$contact_number', address='$address', payment_method='$payment_method', password='$password' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Profile updated successfully!');</script>";
        // Refresh customer data
        $result = $conn->query("SELECT * FROM customers WHERE username='$username'");
        $customer = $result->fetch_assoc();
    } else {
        echo "<script>alert('Error updating profile: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #000000, #FF8C00);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .profile-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
        }
        .profile-header p {
            color: #666;
            font-size: 1rem;
        }
        .profile-form {
            display: flex;
            flex-direction: column;
        }
        .profile-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .profile-form input:focus {
            border-color: #FF8C00;
        }
        .profile-form button {
            width: 100%;
            padding: 12px;
            background: #FF8C00;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }
        .profile-form button:hover {
            background: #e07b00;
        }
        .profile-footer {
            text-align: center;
            margin-top: 20px;
        }
        .profile-footer a {
            color: #FF8C00;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .profile-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>Welcome, <?php echo htmlspecialchars($customer['first_name']); ?>!</h1>
            <p>This is your profile page. You can update your information below.</p>
        </div>
        <form class="profile-form" method="POST" action="">
            <input type="text" name="first_name" placeholder="First Name" value="<?php echo htmlspecialchars($customer['first_name']); ?>" required>
            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo htmlspecialchars($customer['last_name']); ?>" required>
            <input type="text" name="contact_number" placeholder="Contact Number" value="<?php echo htmlspecialchars($customer['contact_number']); ?>" required>
            <input type="text" name="address" placeholder="Address" value="<?php echo htmlspecialchars($customer['address']); ?>" required>
            <input type="text" name="payment_method" placeholder="Payment Method" value="<?php echo htmlspecialchars($customer['payment_method']); ?>" required>
            <input type="password" name="password" placeholder="Password (leave blank to keep current)">
            <button type="submit">Update Profile</button>
        </form>
        <div class="profile-footer">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>