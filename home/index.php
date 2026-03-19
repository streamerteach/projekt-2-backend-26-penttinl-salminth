<?php include "../essentials/handy_methods.php"; ?>
<?php include "../essentials/header.php"; ?>


<body>
    <div id="container"> <!--Max bredd 800px -->
     <?php include "../essentials/nav.php"; ?>
    <section>
        <article>
            <h1>Homepage</h1>
        </article>
    </section>

<section id="annonser">
    <h2>Dating Profiles</h2>

    <div id="filter-section" style="margin-bottom: 20px; padding: 10px; background: #f4f4f4;">
        <label>Preferens:
            <select id="pref-filter">
                <option value="all">Alla</option>
                <option value="1">Preferens 1</option> 
                <option value="2">Preferens 2</option>
            </select>
        </label>
        
        <label style="margin-left: 10px;">Minst antal likes:
            <input type="number" id="likes-filter" value="0" min="0" style="width: 60px;">
        </label>
        
        <button id="btn-filter" style="margin-left: 10px;">Filtrera</button>
    </div>

    <div id="profiles-container"></div>

    <div id="loading-indicator" style="text-align: center; padding: 20px; font-weight: bold;">
        Laddar fler profiler...
    </div>
</section>
<script src="../functions/annonser.js"></script>

    <section id="guestbook">
        <?php include "../functions/gastbok/gastbok.php"; ?>
    </section>
</body>
</html>