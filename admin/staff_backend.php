<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'jxt_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = $_GET['action'] ?? '';

if ($action === 'fetch') {
    // Fetch staff data
    $sql = "SELECT full_name, role, email, contact_number FROM users";
    $result = $conn->query($sql);

    $staffList = [];
    while ($row = $result->fetch_assoc()) {
        $staffList[] = $row;
    }

    echo json_encode($staffList);

} elseif ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add staff data
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $contactNumber = $conn->real_escape_string($_POST['contactNumber']);
    $role = $conn->real_escape_string($_POST['role']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (full_name, username, email, contact_number, role, password) VALUES ('$fullName', '$username', '$email', '$contactNumber', '$role', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
    }
}

$conn->close();
?>
