document.addEventListener("DOMContentLoaded", function () {

    var c = document.getElementById("countdown");
    if (!c) return;

    var t = c.getAttribute("data-time") * 1000;

    setInterval(function () {

        var d = t - new Date().getTime();
        if (d <= 0) {
            c.innerHTML = "Done";
            return;
        }

        c.innerHTML =
            Math.floor(d / 86400000) + " days " +
            Math.floor(d / 3600000) % 24 + " hours " +
            Math.floor(d / 60000) % 60 + " minutes " +
            Math.floor(d / 1000) % 60 + " seconds";

    }, 1000);
});