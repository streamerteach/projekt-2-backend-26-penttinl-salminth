   <header>
        <div id="logo"> Healthy Dating </div>
            <nav>
                <ul>
                <a href="../home/"><li>Home</li></a>
                <?php
                    if (! empty($_SESSION['username'])) {
                        print('<a href="../profile/"><li>profile</li></a>');
                    } else {
                        print('<a href="../login/"><li>login</li></a>');
                    }
                ?>
                </ul>
            </nav>
    </header>
