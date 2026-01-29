<header>
    <div id="logo">Date Bait</div>
    <nav>
        <ul class="navbar">
            <?php
            if (isset($navMode) && $navMode === "login") {
                // Explicit login mode
                echo '<li><a href="../login/index.php">Login</a></li>';
            } elseif (empty($_SESSION['username'])) {
                // Fallback for non-logged-in users
                echo '<li><a href="../login/index.php">Login</a></li>';
            } else {
                // Logged-in mode
                echo '<li><a href="../home/index.php">Home</a></li>';
                echo '<li><a href="../profile/index.php">Profile</a></li>';
                echo '<li><a href="../webbrapport.php">Webbrapport</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>