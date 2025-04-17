<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Match</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>
<body>
    <!--GIADA-->
    <h1>Ecco i possibili charme che abbiamo trovato per te!!</h1>
    <h3>adesso sta a te fare match</h3>
    <div class="card-container">
    <div class="card">
        <img src="images/foto1.jpeg" alt="Profilo 1">
        <h3>Nome Utente</h3>
    </div>
</div>
</body>
</html>
<script>
    const cards = document.querySelectorAll(".card");
cards.forEach(card => {
    let startX, currentX;
    
    card.addEventListener("mousedown", (event) => {
        startX = event.clientX;
    });

    card.addEventListener("mousemove", (event) => {
        if (startX) {
            currentX = event.clientX - startX;
            card.style.transform = `translateX(${currentX}px) rotate(${currentX / 10}deg)`;
        }
    });

    card.addEventListener("mouseup", () => {
        if (Math.abs(currentX) > 150) {
            card.style.transition = "transform 0.5s";
            card.style.transform = `translateX(${currentX > 0 ? 500 : -500}px) rotate(${currentX > 0 ? 45 : -45}deg)`;
            setTimeout(() => card.remove(), 500);
        } else {
            card.style.transform = "translateX(0) rotate(0)";
        }
        startX = null;
    });
});

</script>