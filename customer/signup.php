<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <?php include '../database.php'; ?>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to right, #000000, #FF8C00);
        }

        /* Signup Form Container */
        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .form-container p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .form-container input:focus {
            border-color: #FF8C00;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background: #FF8C00;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button:hover {
            background: #e07b00;
        }

        .form-container .login-link {
            font-size: 0.8rem;
            color: #FF8C00;
            text-decoration: none;
            display: block;
            margin-top: 20px;
        }

        .form-container .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <p>Create your account</p>
        <form method="POST" action="">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <a href="index.php" class="login-link">Already have an account? Log in here</a>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password for security


        // Insert data into the customers table
        $sql = "INSERT INTO customers (first_name, last_name, username, contact_number, address, payment_method, password) VALUES ('$first_name', '$last_name', '$username', '', '', '', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Signup successful! Redirecting to login page...');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }

        $conn->close();
    }
    ?>
</body>
</html>