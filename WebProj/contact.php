<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Corporate Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="index.html">
                <img src="logo.png" alt="PixelCraftsLogo"
            style = "width:100px;height:50px;"></a>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="dropdown">
                        <a href="about.html">About Us</a>
                        <ul class="dropdown-content">
                            <li><a href="approach.html">Approach</a></li>
                        </ul>
                    </li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section class="contact">
            <div class="container">
                <h2>Contact Us</h2>
                 <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

                    // Prepare and bind SQL statement
                    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $name, $email, $message);

                    // Set parameters and execute
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];
                    $stmt->execute();

                    echo "<p>Your message has been sent successfully!</p>";

                    $stmt->close();
                    $conn->close();
                }
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Corporate Website. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
