<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Messages</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Admin Panel</h1>
        </div>
    </header>
    <main>
        <section class="admin">
            <div class="container">
                <h2>Contact Messages</h2>
                <?php
                $servername = "localhost";
                $username = "root"; // Default username for XAMPP MySQL
                $password = ""; // Default password for XAMPP MySQL
                $dbname = "contact_form_db"; // Your database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, name, email, message, created_at FROM contact_messages";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>";
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["message"]. "</td><td>" . $row["created_at"]. "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                $conn->close();
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
