<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
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

        /* Login Form Container */
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

        .form-container .signup-link {
            font-size: 0.8rem;
            color: #FF8C00;
            text-decoration: none;
            display: block;
            margin-top: 20px;
        }

        .form-container .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Log In</h2>
        <p>Welcome back! Please log in to your account.</p>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="signup.php" class="signup-link">Don't have an account? Sign up here</a>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sample authentication (replace this with your actual database verification)
        $validUsername = "customer";
        $validPassword = "password";

        if ($username === $validUsername && $password === $validPassword) {
            echo "<script>alert('Login successful! Redirecting to dashboard...');</script>";
            // You can redirect to another page using header
            // header('Location: dashboard.php');
        } else {
            echo "<script>alert('Invalid username or password. Please try again.');</script>";
        }
    }
    ?>
</body>
</html>
    