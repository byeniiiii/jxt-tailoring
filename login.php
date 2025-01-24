<?php
session_start();
require 'database.php'; // Include your database connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check the user in the database
    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            switch ($user['role']) {
                case 'Admin':
                    header("Location: admin/home.php");
                    break;
                case 'manager':
                    header("Location: manager/home.php");
                    break;
                case 'Staff':
                    header("Location: customer/home.php");
                    break;
                default:
                    header("Location: login.php");
                    break;
            }
            exit;
        } else {
            echo "<script>alert('Invalid password. Please try again.'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('No user found with this username.'); window.location.href='index.php';</script>";
    }
}
?>
