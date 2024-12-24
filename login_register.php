<?php
require 'vendor/autoload.php';  // Composer autoload to load MongoDB library

$client = new MongoDB\Client("mongodb+srv://dogancandemir2001:vB552NzqmztOZdes@cluster0.utmhslq.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");  // Connect to MongoDB Cluster
$db = $client->webprogrammingproject;  // Replace 'myDatabase' with your database name
$usersCollection = $db->users;  // Replace 'users' with your collection name

// Register User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash password

    // Check if user already exists
    $existingUser = $usersCollection->findOne(['email' => $email]);
    if ($existingUser) {
        echo "User already exists with this email.";
    } else {
        // Insert the new user into MongoDB
        $result = $usersCollection->insertOne([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'favorities' => [],  // Add empty list for favorities
        ]);

        if ($result->getInsertedCount() > 0) {
            echo "User registered successfully!";
        } else {
            echo "Error in registration!";
        }
    }
}

// Login User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Find the user by email
    $user = $usersCollection->findOne(['email' => $email]);

    if ($user && password_verify($password, $user['password'])) {
        // If credentials are correct, send a success response
        echo "<script>
                localStorage.setItem('user', JSON.stringify({ name: '{$user['name']}', email: '{$user['email']}', id: '{$user['_id']}' }));
                window.location.href = 'index.php';  // Redirect to index.php after login
              </script>";
    } else {
        echo "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <style>
        /* Styles similar to previous example */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }
        .form-container h2 {
            text-align: center;
            color: #007BFF;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 15px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .form-container .switch-link {
            text-align: center;
            font-size: 14px;
        }
        .form-container .switch-link a {
            color: #007BFF;
            text-decoration: none;
        }
        .form-container .switch-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Login</h2>
        <form action="login_register.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <div class="switch-link">
            Don't have an account? <a href="#" onclick="showRegisterForm()">Register</a>
        </div>
    </div>
    
    <div class="form-container" id="registerForm" style="display: none;">
        <h2>Register</h2>
        <form action="login_register.php" method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <div class="switch-link">
            Already have an account? <a href="#" onclick="showLoginForm()">Login</a>
        </div>
    </div>
</div>

<script>
    function showRegisterForm() {
        document.querySelector(".form-container h2").textContent = "Register";
        document.querySelector('form').action = "login_register.php"; // Add appropriate action URL if needed
        document.querySelector("button").name = "register";
        document.getElementById("registerForm").style.display = "block";
        document.querySelector(".form-container").style.display = "none";
    }

    function showLoginForm() {
        document.querySelector(".form-container h2").textContent = "Login";
        document.querySelector('form').action = "login_register.php"; // Add appropriate action URL if needed
        document.querySelector("button").name = "login";
        document.getElementById("registerForm").style.display = "none";
        document.querySelector(".form-container").style.display = "block";
    }
</script>
<script>
document.getElementById('add-to-favorites-btn').addEventListener('click', function () {
    const user = JSON.parse(localStorage.getItem('user'));
    const productId = this.getAttribute('data-product-id');

    if (!user) {
        alert('You need to log in to add this item to your favorites.');
        return;
    }

    fetch('api/update_favorites.php', { // Adjust the path to match your setup
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            userId: user.id,
            productId: productId,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item added to your favorites!');
            localStorage.setItem('user', JSON.stringify(data.updatedUser));
        } else {
            alert('Failed to add item to favorites: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while adding to favorites.');
    });
});
</script>

</body>
</html>
