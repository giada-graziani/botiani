<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CharmMatch - Trova il tuo match!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Ecco i posssibili charm che abbiamo trovato per te!</h1>
        <h3>Scorri per trovare il tuo match perfetto!</h3>
    </div>
    
    <div class="carta-container" id="carteContainer"></div>
    
    <div class="bottoni">
        <button class="bottone dislike" id="dislikeBtn">✕</button>
        <button class="bottone like" id="likeBtn">♥</button>
    </div>
    
    <div class="fineCarte" id="noCarte">
        <h3>Hai visto tutti i profili per oggi!</h3>
        <button id="ricarica">Ricarica altri profili</button>
    </div>
    
    <div class="popUp" id="matchPopup">
        <h2>È un Match!<br>Hai fatto colpo!</h2>
        <div class="profili">
            <div class="profilo">
                <img src="images/me.jpg" alt="Il tuo profilo">
            </div>
            <div class="profilo" id="fotoProfilo">
                <!-- Immagine del profilo con cui hai fatto match -->
            </div>
        </div>
        <button class="match-button" id="continua">Continua a cercare</button>
    </div>

    <script>
        // Dati di esempio per i profili
        const profili = [
            { name: "Laura", age: 25, bio: "Amante dei viaggi e del buon cibo", image: "images/foto1.jpeg" },
            { name: "Marco", age: 28, bio: "Appassionato di musica e sport", image: "images/foto2.jpeg" },
            { name: "Giulia", age: 24, bio: "Amo gli animali e la natura", image: "images/foto3.jpeg" },
            { name: "Alessandro", age: 27, bio: "Chef e appassionato di fotografia", image: "images/foto4.jpeg" },
            { name: "Elena", age: 26, bio: "Ballerina e istruttrice di yoga", image: "images/foto5.jpeg" }
        ];

        // Indice del profilo attuale che dovrà essere disponibile per il match
        let indProfiloInit = 0;
        let contaCarte = 0;
        
        // Generazione casuale di match (per simulazione)
        function match() {
            return Math.random() > 0.7; // 30% di probabilità di match
        }
        
        // Carica le cards iniziali
        function carteIniziali() {
            const carteContainer = document.getElementById('carteContainer');
            carteContainer.innerHTML = '';
            
            // Carica le prime 3 cards 
            const carteDaCaricare = Math.min(3, profili.length - indProfiloInit);
            
            if (carteDaCaricare === 0) {
                document.getElementById('noCarte').style.display = 'block';
                return;
            }
            
            for (let i = 0; i < carteDaCaricare; i++) {
                const indiceProfilo = indProfiloInit + i;
                if (indiceProfilo >= profili.length) break;
                
                const profilo = profili[indiceProfilo];
                const carta = creaCarta(profilo, i === 0);
                carteContainer.appendChild(carta);
                contaCarte++;
            }
            
            // Inizializza il dragging sulla prima carta
            initTrascinamento(document.querySelector('.carta.active'));
        }
        
        // Crea una carta per un profilo
        function creaCarta(profilo, isActive) {
            const carta = document.createElement('div');
            carta.className = `carta${isActive ? ' active' : ''}`;
            carta.innerHTML = `
                <img src="${profilo.image}" alt="${profilo.name}">
                <div class="carta-info">
                    <h3>${profilo.name}, ${profilo.age}</h3>
                    <p>${profilo.bio}</p>
                </div>
                <div class="overlay like-overlay">LIKE</div>
                <div class="overlay dislike-overlay">NOPE</div>
            `;
            return carta;
        }
        
        // Funzione per inizializzare il trascinamento di una carta
        function initTrascinamento(carta) {
            if (!carta) return;
            
            let startX, currentX = 0;
            const likeOverlay = carta.querySelector('.like-overlay');
            const dislikeOverlay = carta.querySelector('.dislike-overlay');
            
            function movimentoIniziale(event) {
                // Supporto per touch e mouse
                startX = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
                carta.style.transition = '';
            }
            
            function trascinamento(event) {
                if (!startX) return;
                
                // Calcola spostamento
                const pageX = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
                currentX = pageX - startX;
                
                // Applica la trasformazione
                const rotazione = currentX / 10;
                carta.style.transform = `translateX(${currentX}px) rotate(${rotazione}deg)`;
                
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
            
            function movimentoFinale() {
                if (!startX) return;
                
                carta.style.transition = 'transform 0.5s';
                
                if (currentX > 100) {
                    // Like
                    swipeCard(carta, 'right');
                } else if (currentX < -100) {
                    // Dislike
                    swipeCard(carta, 'left');
                } else {
                    // Ritorna alla posizione originale
                    carta.style.transform = '';
                    likeOverlay.style.opacity = 0;
                    dislikeOverlay.style.opacity = 0;
                }
                
                startX = null;
            }
            
            // Event listeners per mouse
            carta.addEventListener('mousedown', movimentoIniziale);
            document.addEventListener('mousemove', trascinamento);
            document.addEventListener('mouseup', movimentoFinale);
            
            // Event listeners per touch
            /*carta.addEventListener('touchstart', movimentoIniziale);
            carta.addEventListener('touchmove', trascinamento);
            carta.addEventListener('touchend', movimentoFinale);*/
        }
        
        // Funzione per scorrere una carta (destra = like, sinistra = dislike)
        function swipeCard(carta, direction) {
            const isLike = direction === 'right';
            const translateX = isLike ? 1000 : -1000;
            const rotazione = isLike ? 30 : -30;
            
            carta.style.transform = `translateX(${translateX}px) rotate(${rotazione}deg)`;
            
            // Se è un like, controlla se c'è un match
            if (isLike && match()) {
                showMatch(profili[indProfiloInit]);
            }
            
            // Dopo l'animazione, rimuovi la carta e aggiorna
            setTimeout(() => {
                carta.remove();
                contaCarte--;
                indProfiloInit++;
                
                // Se non ci sono più cards, carica altre
                if (contaCarte === 0) {
                    carteIniziali();
                } else {
                    // Altrimenti attiva la prossima carta
                    const nextCard = document.querySelector('.carta:not(.active)');
                    if (nextCard) {
                        nextCard.classList.add('active');
                        initTrascinamento(nextCard);
                    }
                }
            }, 500);
        }
        
        // Mostra il popup di match
        function showMatch(profilo) {
            const matchPopup = document.getElementById('matchPopup');
            const fotoProfilo = document.getElementById('fotoProfilo');
            
            // Imposta l'immagine del profilo con cui hai fatto match
            fotoProfilo.innerHTML = `<img src="${profilo.image}" alt="${profilo.name}">`;
            
            // Mostra il popup
            matchPopup.classList.add('active');
        }
        
        // Event listeners per i pulsanti
        document.getElementById('likeBtn').addEventListener('click', () => {
            const activeCard = document.querySelector('.carta.active');
            if (activeCard) swipeCard(activeCard, 'right');
        });
        
        document.getElementById('dislikeBtn').addEventListener('click', () => {
            const activeCard = document.querySelector('.carta.active');
            if (activeCard) swipeCard(activeCard, 'left');
        });
        
        document.getElementById('continua').addEventListener('click', () => {
            document.getElementById('matchPopup').classList.remove('active');
        });
        
        document.getElementById('ricarica').addEventListener('click', () => {
            indiceProfilo = 0;
            document.getElementById('noCarte').style.display = 'none';
            carteIniziali();
        });
        
        // Inizializza l'app
        carteIniziali();
    </script>
</body>
</html>