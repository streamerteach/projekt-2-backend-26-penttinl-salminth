   <header>
        <div id="logo"> Healthy Dating </div>
            <nav>
                <ul>
                <a href="../home/index.php"><li>Home</li></a>
                <?php
                    if (! empty($_SESSION['username'])) {
                        print('<a href="../profile/index.php"><li>profile</li></a>');
                    } else {
                        print('<a href="../login/index.php"><li>login</li></a>');
                    }
                ?>
                </ul>
            </nav>
    </header>
