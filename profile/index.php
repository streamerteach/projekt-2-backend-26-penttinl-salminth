<?php include "../essentials/handy_methods.php"; ?>
<?php include "../essentials/header.php"; ?>
<?php
    $previousVisit          = $_SESSION['last_visit'] ?? null;
    $_SESSION['last_visit'] = date('d-m-Y H:i:s');
?>

<body>
<div id="container"> <!--Max bredd 800px -->
    <?php include "../essentials/nav.php"; ?>
    <section style="display: flex; justify-content: space-between;">
    <div style="flex: 1;">
        <article>
            <h1>My profile</h1>
           <div class="profile-info">
                    <p><strong>User:</strong> <?php echo $_SESSION['username']; ?>
                </p>
                    <p><strong>Last visit:</strong>
                    <?php echo $previousVisit ? $previousVisit : "This is your first visit"; ?>
                </p>
</div>

            <p>You can upload a profile picture here</p>
        </article>

        <div class="imageupload">
            <form action="./index.php" method="post" enctype="multipart/form-data">
                Select image to upload:<br>
                <input type="file" name="profile_image" id="fileToUpload" accept="image/*"><br>
                <input type="submit" value="Upload Image" name="upload">
            </form>
        </div>
    </div>

    <div style="flex: 1;">
        <?php include "../functions/profilbild.php"; ?>
    </div>


</section>

    <section>
        <article>
            <?php include "../functions/TimeAndDate/tiden.php"; ?>
        </article>
    </section>

    <section id="datebooking">
        <h2>Put in the date and time for your date and see how much time there is left!</h2>
        <?php include "../functions/TimeAndDate/countdown.php"; ?>
        <button type="button" id="resetCountdown">Restart</button>
        <!-- ska modifiera timern ennu så att insatta datumet och tiden sparas, och endast resettas av en "reset" knapp -->

    </section>
    <section>
    <?php include "../functions/visitcounter.php"; ?>
    </section>
    <script src="../countdown.js"></script>
</body>
</html>