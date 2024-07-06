<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Admin Login</h1>
        </div>
    </header>
    <main>
        <section class="login">
            <div class="container">
                <h2>Login</h2>
                <form method="post" action="login.php">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Login</button>
                </form>
                <?php
                session_start();

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $servername = "localhost";
                    $db_username = "root"; // Default username for XAMPP MySQL
                    $db_password = ""; // Default password for XAMPP MySQL
                    $dbname = "contact_form_db"; // Your database name

                    // Create connection
                    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $stmt = $conn->prepare("SELECT password FROM admin_users WHERE username = ?");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $stmt->bind_result($stored_password);
                    $stmt->fetch();
                    $stmt->close();
                    $conn->close();

                    if ($stored_password && $stored_password === $password) {
                        $_SESSION['loggedin'] = true;
                        header("Location: admin.php");
                        exit;
                    } else {
                        echo "<p>Invalid username or password</p>";
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 PixelCrafts Design. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
