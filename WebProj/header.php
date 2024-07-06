<nav>
    <ul>
        <li class="dropdown">
            <a href="#">About</a>
            <ul class="dropdown-content">
                <li><a href="approach.php">Approach</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#">Services</a>
            <ul class="dropdown-content">
                <li><a href="work-process.php">Work Process</a></li>
            </ul>
        </li>
        <li><a href="contact.php">Contact</a></li>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
            <li><a href="admin.php">Admin</a></li>
        <?php endif; ?>
    </ul>
</nav>
