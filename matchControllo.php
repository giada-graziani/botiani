<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CharmMatch - Trova il tuo match!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            color: #333;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }
        
        .header h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .header h3 {
            font-weight: 400;
            font-size: 1.2rem;
        }
        
        .card-container {
            position: relative;
            width: 320px;
            height: 450px;
            max-width: 90vw;
            perspective: 1000px;
        }
        
        .card {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            background-color: white;
            cursor: grab;
            transition: transform 0.1s;
            user-select: none;
        }
        
        .card.active {
            z-index: 10;
        }
        
        .card img {
            width: 100%;
            height: 75%;
            object-fit: cover;
        }
        
        .card-info {
            padding: 15px;
        }
        
        .card-info h3 {
            font-size: 1.4rem;
            margin-bottom: 5px;
        }
        
        .card-info p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .action-buttons {
            display: flex;
            justify-content: space-around;
            width: 250px;
            margin-top: 30px;
        }
        
        .action-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .action-button:hover {
            transform: scale(1.1);
        }
        
        .dislike {
            background-color: #ff4757;
            color: white;
        }
        
        .like {
            background-color: #2ed573;
            color: white;
        }
        
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            font-weight: bold;
            color: white;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }
        
        .like-overlay {
            background-color: rgba(46, 213, 115, 0.5);
            border-radius: 15px;
        }
        
        .dislike-overlay {
            background-color: rgba(255, 71, 87, 0.5);
            border-radius: 15px;
        }
        
        .match-popup {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 100;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.5s;
        }
        
        .match-popup.active {
            opacity: 1;
            pointer-events: all;
        }
        
        .match-popup h2 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .match-profiles {
            display: flex;
            margin-bottom: 30px;
        }
        
        .match-profile {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            overflow: hidden;
            margin: 0 10px;
        }
        
        .match-profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .match-button {
            padding: 12px 25px;
            border-radius: 25px;
            border: none;
            background-color: white;
            color: #333;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .match-button:hover {
            background-color: #f1f1f1;
            transform: scale(1.05);
        }

        .no-more-cards {
            display: none;
            text-align: center;
            margin-top: 40px;
            color: white;
        }
        
        .no-more-cards h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }
        
        .no-more-cards button {
            padding: 12px 25px;
            border-radius: 25px;
            border: none;
            background-color: white;
            color: #333;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .no-more-cards button:hover {
            background-color: #f1f1f1;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>CharmMatch</h1>
        <h3>Scorri per trovare il tuo match perfetto!</h3>
    </div>
    
    <div class="card-container" id="cardContainer"></div>
    
    <div class="action-buttons">
        <button class="action-button dislike" id="dislikeBtn">✕</button>
        <button class="action-button like" id="likeBtn">♥</button>
    </div>
    
    <div class="no-more-cards" id="noMoreCards">
        <h3>Hai visto tutti i profili per oggi!</h3>
        <button id="resetBtn">Ricarica altri profili</button>
    </div>
    
    <div class="match-popup" id="matchPopup">
        <h2>È un Match!<br>Hai fatto colpo!</h2>
        <div class="match-profiles">
            <div class="match-profile">
                <img src="images/me.jpg" alt="Il tuo profilo">
            </div>
            <div class="match-profile" id="matchedProfilePic">
                <!-- Immagine del profilo con cui hai fatto match -->
            </div>
        </div>
        <button class="match-button" id="continueBtn">Continua a cercare</button>
    </div>

    <script>
        // Dati di esempio per i profili
        const profiles = [
            { name: "Laura", age: 25, bio: "Amante dei viaggi e del buon cibo", image: "images/foto1.jpeg" },
            { name: "Marco", age: 28, bio: "Appassionato di musica e sport", image: "images/foto2.jpeg" },
            { name: "Giulia", age: 24, bio: "Amo gli animali e la natura", image: "images/foto3.jpeg" },
            { name: "Alessandro", age: 27, bio: "Chef e appassionato di fotografia", image: "images/foto4.jpeg" },
            { name: "Elena", age: 26, bio: "Ballerina e istruttrice di yoga", image: "images/foto5.jpeg" }
        ];

        // Indice del profilo attuale che dovrà essere disponibile per il match
        let currentProfileIndex = 0;
        let cardCount = 0;
        
        // Generazione casuale di match (per simulazione)
        function hasMatch() {
            return Math.random() > 0.7; // 30% di probabilità di match
        }
        
        // Carica le cards iniziali
        function loadCards() {
            const cardContainer = document.getElementById('cardContainer');
            cardContainer.innerHTML = '';
            
            // Carica le prime 3 cards (o meno se non ci sono abbastanza profili)
            const cardsToLoad = Math.min(3, profiles.length - currentProfileIndex);
            
            if (cardsToLoad === 0) {
                document.getElementById('noMoreCards').style.display = 'block';
                return;
            }
            
            for (let i = 0; i < cardsToLoad; i++) {
                const profileIndex = currentProfileIndex + i;
                if (profileIndex >= profiles.length) break;
                
                const profile = profiles[profileIndex];
                const card = createCard(profile, i === 0);
                cardContainer.appendChild(card);
                cardCount++;
            }
            
            // Inizializza il dragging sulla prima card
            initDragging(document.querySelector('.card.active'));
        }
        
        // Crea una card per un profilo
        function createCard(profile, isActive) {
            const card = document.createElement('div');
            card.className = `card${isActive ? ' active' : ''}`;
            card.innerHTML = `
                <img src="${profile.image}" alt="${profile.name}">
                <div class="card-info">
                    <h3>${profile.name}, ${profile.age}</h3>
                    <p>${profile.bio}</p>
                </div>
                <div class="overlay like-overlay">LIKE</div>
                <div class="overlay dislike-overlay">NOPE</div>
            `;
            return card;
        }
        
        // Funzione per inizializzare il trascinamento di una card
        function initDragging(card) {
            if (!card) return;
            
            let startX, currentX = 0;
            const likeOverlay = card.querySelector('.like-overlay');
            const dislikeOverlay = card.querySelector('.dislike-overlay');
            
            function handleStart(event) {
                // Supporto per touch e mouse
                startX = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
                card.style.transition = '';
            }
            
            function handleMove(event) {
                if (!startX) return;
                
                // Calcola spostamento
                const pageX = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
                currentX = pageX - startX;
                
                // Applica la trasformazione
                const rotation = currentX / 10;
                card.style.transform = `translateX(${currentX}px) rotate(${rotation}deg)`;
                
                // Gestisci overlay
                if (currentX > 0) {
                    likeOverlay.style.opacity = Math.min(currentX / 100, 1);
                    dislikeOverlay.style.opacity = 0;
                } else if (currentX < 0) {
                    dislikeOverlay.style.opacity = Math.min(Math.abs(currentX) / 100, 1);
                    likeOverlay.style.opacity = 0;
                } else {
                    likeOverlay.style.opacity = 0;
                    dislikeOverlay.style.opacity = 0;
                }
            }
            
            function handleEnd() {
                if (!startX) return;
                
                card.style.transition = 'transform 0.5s';
                
                if (currentX > 100) {
                    // Like
                    swipeCard(card, 'right');
                } else if (currentX < -100) {
                    // Dislike
                    swipeCard(card, 'left');
                } else {
                    // Ritorna alla posizione originale
                    card.style.transform = '';
                    likeOverlay.style.opacity = 0;
                    dislikeOverlay.style.opacity = 0;
                }
                
                startX = null;
            }
            
            // Event listeners per mouse
            card.addEventListener('mousedown', handleStart);
            document.addEventListener('mousemove', handleMove);
            document.addEventListener('mouseup', handleEnd);
            
            // Event listeners per touch
            card.addEventListener('touchstart', handleStart);
            card.addEventListener('touchmove', handleMove);
            card.addEventListener('touchend', handleEnd);
        }
        
        // Funzione per scorrere una card (destra = like, sinistra = dislike)
        function swipeCard(card, direction) {
            const isLike = direction === 'right';
            const translateX = isLike ? 1000 : -1000;
            const rotation = isLike ? 30 : -30;
            
            card.style.transform = `translateX(${translateX}px) rotate(${rotation}deg)`;
            
            // Se è un like, controlla se c'è un match
            if (isLike && hasMatch()) {
                showMatch(profiles[currentProfileIndex]);
            }
            
            // Dopo l'animazione, rimuovi la card e aggiorna
            setTimeout(() => {
                card.remove();
                cardCount--;
                currentProfileIndex++;
                
                // Se non ci sono più cards, carica altre
                if (cardCount === 0) {
                    loadCards();
                } else {
                    // Altrimenti attiva la prossima card
                    const nextCard = document.querySelector('.card:not(.active)');
                    if (nextCard) {
                        nextCard.classList.add('active');
                        initDragging(nextCard);
                    }
                }
            }, 500);
        }
        
        // Mostra il popup di match
        function showMatch(profile) {
            const matchPopup = document.getElementById('matchPopup');
            const matchedProfilePic = document.getElementById('matchedProfilePic');
            
            // Imposta l'immagine del profilo con cui hai fatto match
            matchedProfilePic.innerHTML = `<img src="${profile.image}" alt="${profile.name}">`;
            
            // Mostra il popup
            matchPopup.classList.add('active');
        }
        
        // Event listeners per i pulsanti
        document.getElementById('likeBtn').addEventListener('click', () => {
            const activeCard = document.querySelector('.card.active');
            if (activeCard) swipeCard(activeCard, 'right');
        });
        
        document.getElementById('dislikeBtn').addEventListener('click', () => {
            const activeCard = document.querySelector('.card.active');
            if (activeCard) swipeCard(activeCard, 'left');
        });
        
        document.getElementById('continueBtn').addEventListener('click', () => {
            document.getElementById('matchPopup').classList.remove('active');
        });
        
        document.getElementById('resetBtn').addEventListener('click', () => {
            currentProfileIndex = 0;
            document.getElementById('noMoreCards').style.display = 'none';
            loadCards();
        });
        
        // Inizializza l'app
        loadCards();
    </script>
</body>
</html>