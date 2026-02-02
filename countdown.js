document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("dateForm");
    const container = document.getElementById("datebooking");
    const resetBtn = document.getElementById("resetCountdown");
    let countdownDiv = document.getElementById("countdown");
    let interval;

    function createCountdownDiv() {
        if (!countdownDiv) {
            countdownDiv = document.createElement("div");
            countdownDiv.id = "countdown";
            container.appendChild(countdownDiv);
        }
    }

    function startCountdown(seconds) {
        createCountdownDiv();
        clearInterval(interval);

        interval = setInterval(() => {
            if (seconds <= 0) {
                countdownDiv.textContent = "Done";
                clearInterval(interval);
                return;
            }

            const days = Math.floor(seconds / 86400);
            const hours = Math.floor(seconds / 3600) % 24;
            const minutes = Math.floor(seconds / 60) % 60;
            const secs = seconds % 60;

            countdownDiv.textContent = `${days} days ${hours} hours ${minutes} minutes ${secs} seconds`;
            seconds--;
        }, 1000);
    }

    // Start countdown if PHP already set it
    if (countdownDiv) {
        const seconds = parseInt(countdownDiv.dataset.seconds);
        startCountdown(seconds);
    }

    // Handle form submit
    form.addEventListener("submit", e => {
        e.preventDefault();

        const date = form.date.value;
        const time = form.time.value;
        if (!date || !time) return;

        const target = new Date(`${date}T${time}`).getTime();
        const now = Date.now();
        const secondsLeft = Math.floor((target - now) / 1000);

        if (secondsLeft <= 0) {
            alert("Please enter a future date/time!");
            return;
        }

        startCountdown(secondsLeft);
    });

    // Reset button
    resetBtn.addEventListener("click", () => {
        clearInterval(interval);
        createCountdownDiv();
        countdownDiv.textContent = "Done";
        form.reset();
    });
});