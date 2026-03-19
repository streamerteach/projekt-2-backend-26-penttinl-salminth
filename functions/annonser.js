
let currentPage = 1;
let isFetching = false;
let hasMore = true;

const container = document.getElementById('profiles-container');
const loader = document.getElementById('loading-indicator');
const btnFilter = document.getElementById('btn-filter');

// Funktionen som hämtar datan från load_ads.php
async function loadProfiles(reset = false) {
    if (isFetching || (!hasMore && !reset)) return;
    isFetching = true;

    // Om vi tryckt på Filtrera, rensa containern och börja på sida 1
    if (reset) {
        currentPage = 1;
        container.innerHTML = '';
        hasMore = true;
        loader.style.display = 'block';
        loader.innerText = 'Laddar profiler...';
    }

    // Hämta inmatade värden från filtren
    const pref = document.getElementById('pref-filter').value;
    const likes = document.getElementById('likes-filter').value || 0;

    try {
        const url = `../functions/load_ads.php?page=${currentPage}&pref=${pref}&likes=${likes}`;
        const response = await fetch(url);
        const html = await response.text();

        if (html.trim() === '') {
            // PHP returnerade inget, profilerna är slut
            hasMore = false;
            loader.innerText = 'Inga fler profiler hittades.';
        } else {
            container.insertAdjacentHTML('beforeend', html);
            currentPage++; // Redo för nästa sida
        }
    } catch (error) {
        console.error("Kunde inte hämta annonser:", error);
        loader.innerText = 'Ett fel uppstod.';
    } finally {
        isFetching = false;
    }
}

// Lyssna på klick på filtrera knappen
btnFilter.addEventListener('click', () => {
    loadProfiles(true); // true betyder att vi nollställer listan
});

const observer = new IntersectionObserver((entries) => {
    // Om vi ser "Laddar profiler..."-texten på skärmen
    if (entries[0].isIntersecting) {
        loadProfiles();
    }
}, {
    //gör att laddningen börjar före man e i slute
    rootMargin: '100px'
});


observer.observe(loader);


async function toggleLike(profileId) {
    try {
        const response = await fetch('../functions/toggle_like.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `profile_id=${profileId}`
        });

        const result = await response.text();

        const likesSpan = document.getElementById(`likes-${profileId}`);
        const btn = document.getElementById(`btn-${profileId}`);

        let currentLikes = parseInt(likesSpan.innerText);

        if (result === "liked") {
            likesSpan.innerText = currentLikes + 1;
            btn.innerText = "Unlike";
        } else if (result === "unliked") {
            likesSpan.innerText = currentLikes - 1;
            btn.innerText = "Like";
        }

    } catch (error) {
        console.error("Like error:", error);
    }
}