<header>
    <div id="logo">Date Bait</div>
    <nav>
        <ul class="navbar">
            <li><a href="../home/index.php">Home</a></li>
            <?php
                if (!empty($_SESSION['username'])) {
                    echo '<li><a href="../profile/index.php">Profile</a></li>';
                } else {
                    echo '<li><a href="../login/index.php">Login</a></li>';
                }
            ?>
            <li><a href="../webbrapport/index.php">Webbrapport</a></li>
        </ul>
    </nav>
</header>