<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        /* Main Container */
        .container {
            display: flex;
            width: 900px;
            height: 500px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Left Section - Form */
        .form-section {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .form-section p {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .form-section input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .form-section input:focus {
            border-color: #FF8C00;
        }

        .form-section a {
            font-size: 0.8rem;
            color: #FF8C00;
            text-decoration: none;
            display: block;
            margin-bottom: 20px;
            text-align: right;
        }

        .form-section button {
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

        .form-section button:hover {
            background: #e07b00;
        }

        /* Right Section - Tailoring Shop Graphic */
        .image-section {
            width: 50%;
            background: #F5F7FA;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-section img {
            height: 500px;
            width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section: Form -->
        <div class="form-section">
            <h2>Log In</h2>
            <p>Welcome back! Please login to your account.</p>
            <form method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>

        <!-- Right Section: Tailoring Shop Graphic -->
        <div class="image-section">
            <img src="photo2.jpg" alt="Tailoring Shop Illustration">
        </div>
    </div>
</body>
</html>