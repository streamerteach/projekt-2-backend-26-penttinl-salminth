<?php include "../essentials/handy_methods.php"; ?>

    <?php
        //check if user is logged in
        if (empty($_SESSION['username'])) {
            header("Location: ../login/index.php");
            exit;
        }
    ?>

    <?php
        $previousVisit          = $_SESSION['last_visit'] ?? null;
        $_SESSION['last_visit'] = date('d-m-Y H:i:s');
    ?>

<?php include "../essentials/header.php"; ?>
<body>
<div id="container">

    <?php include "../essentials/nav.php"; ?>

    <!-- Profil sektionen -->
    <section class="profiler" style="display: flex; gap: 20px; align-items: center;">
        <div style="flex: 1;">
            <p><strong>User:</strong> <?php echo $_SESSION['username']; ?></p>
            <p><strong>Last visit:</strong> <?php echo $previousVisit ?? "This is your first visit"; ?></p>

            <div class="imageupload">
                <form action="./index.php" method="post" enctype="multipart/form-data">
                    Select image to upload:<br>
                    <input type="file" name="profile_image" accept="image/*"><br>
                    <input type="submit" value="Upload Image" name="upload">
                </form>
            </div>
        </div>

        <div style="flex: 1; text-align:center;">
            <?php include "../functions/profilbild.php"; ?>
        </div>
    </section>

    <!-- tid och datum -->
    <section class="profiler">
        <?php include "../functions/TimeAndDate/tiden.php"; ?>
    </section>

    <!-- countdown  -->
    <section class="profiler" id="datebooking">
        <h2>Put in the date and time for your date and see how much time there is left!</h2>
        <?php include "../functions/TimeAndDate/countdown.php"; ?>
        <button type="button" id="resetCountdown">Restart</button>
    </section>

    <!-- besöksräknaren -->
    <section class="profiler">
        <?php include "../functions/visitcounter.php"; ?>
    </section>

    <!-- profil uppdateringen -->
    <section class="profiler">
        <h2>Update your profile</h2>
        <?php include "update_form.php"; ?>
    </section>

    <!-- radera profil -->
    <section class="profiler">
        <h2>Delete your profile</h2>
        <?php include "delete_form.php"; ?>
    </section>

</div>
<script src="../countdown.js"></script>
</body>
</html>