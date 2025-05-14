<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
</head>
<body class="bodyMatch">
    <?php
        include("conn.php");
        session_start();
        $idU=$_SESSION['idU'];
        echo"<p id='idU' hidden='hidden'>$idU</p>";
    ?>
    <div class="header">
        <h1>Ecco i posssibili charm che abbiamo trovato per te!</h1>
        <h3>Scorri per trovare il tuo match perfetto!</h3>
    </div>

    <div class="fineCarte" id="noCarte">
        <h3>Hai visto tutti i profili per oggi!</h3>
        <button id="ricarica">Ricarica altri profili</button>
    </div>
    
    <div class="carta-container" id="carteContainer"></div>
    
    <div class="bottoni">
        <button class="bottone dislike" id="dislikeBtn">✕</button>
        <button class="bottone like" id="likeBtn">♥</button>
    </div>
    <div>
        <a href="riassunto.php"><p>Guarda le persone con cui hai fatto match!</p></a>
    </div>
    
    
    <div class="popUp" id="matchPopup">
        <h2>È un Match!<br>Hai fatto colpo!</h2>
        <div class="profili">
            <div class="profilo" id="fotoProfiloMio">
            <?php
                $q ="SELECT 
                            *
                        FROM
                            foto
                        WHERE 
                            id_utenti='$idU'";
                    $ris=mysqli_query($conn,$q) or die ("Query fallita " . mysqli_error($conn));

                while($row= mysqli_fetch_assoc($ris)){
                    echo"<img src='./images/$row[foto]'>;";
                }
                ?>
                <!---->
            </div>
            <div class="profilo" id="fotoProfilo">
                <!-- Immagine del profilo con cui hai fatto match -->
            </div>
        </div>
        <button class="match-button" id="continua">Continua a cercare</button>
    </div>


</body>
</html>
<script type=text/javascript>
   $(document).ready(function(){
    let profili = [];
    let idU = document.getElementById('idU').innerText;
    
    $.ajax({
        url: "operazioniData.php",
        data: {
            functionname: "prendiProfilo",
            idU: idU
        },
        method: "POST",
        dataType: "json",
        success: function(risposta) {
            profili = risposta;
            
            if (profili && Array.isArray(profili) && profili.length > 0) {
                console.log("Profili recuperati:", profili);
                initApp();
            } else {
                console.log("Nessun profilo trovato.");
                document.getElementById('noCarte').style.display = 'block';
            }
        }
    });
    
    function initApp() {
        // Il container dove mettiamo le carte
        const carteContainer = document.getElementById('carteContainer');
        // Indice del profilo attualmente visibile
        let indiceProfiloAttuale = 0;
        
        // Funzione per creare tutte le carte contemporaneamente
        function creaTutteLeCarte() {
            // Svuota il container
            carteContainer.innerHTML = '';
            
            if (indiceProfiloAttuale >= profili.length) {
                // Non ci sono più profili da mostrare
                document.getElementById('noCarte').style.display = 'block';
                document.getElementById('dislikeBtn').style.display = 'none';
                document.getElementById('likeBtn').style.display = 'none';
                carteContainer.style.display = 'none';
                return;
            }
            
            // Mostra al massimo 3 carte alla volta, se disponibili
            const numCarteVisibili = Math.min(3, profili.length - indiceProfiloAttuale);
            
            // Crea le carte in ordine inverso così che la prima sia in cima
            for (let i = numCarteVisibili - 1; i >= 0; i--) {
                const profiloIndex = indiceProfiloAttuale + i;
                const profilo = profili[profiloIndex];
                
                // Crea la carta
                const carta = document.createElement('div');
                carta.className = 'carta' + (i === 0 ? ' active' : '');
                carta.dataset.profiloIndex = profiloIndex;
                
                carta.innerHTML = `
                    <img src="./images/${profilo.foto}" alt="${profilo.nome}">
                    <div class="carta-info">
                        <h3>${profilo.nome}, ${profilo.eta}</h3>
                        <p>${profilo.descrizionePersona}</p>
                    </div>
                    <div class="overlay like-overlay">LIKE</div>
                    <div class="overlay dislike-overlay">NOPE</div>
                `;
                
                carteContainer.appendChild(carta);
            }
            
            // Inizializza il dragging solo sulla carta attiva (la prima)
            initTrascinamento(document.querySelector('.carta.active'));
        }
        
        // Funzione per gestire il trascinamento
        function initTrascinamento(carta) {
            if (!carta) return;
            
            let startX, currentX = 0;
            const likeOverlay = carta.querySelector('.like-overlay');
            const dislikeOverlay = carta.querySelector('.dislike-overlay');
            
            function movimentoIniziale(event) {
                startX = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
                carta.style.transition = '';
            }
            
            function trascinamento(event) {
                if (!startX) return;
                
                const pageX = event.type.includes('mouse') ? event.clientX : event.touches[0].clientX;
                currentX = pageX - startX;
                
                // Applica trasformazione
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
                    elaboraSwipe(carta, 'right');
                } else if (currentX < -100) {
                    // Dislike
                    elaboraSwipe(carta, 'left');
                } else {
                    // Ritorna alla posizione originale
                    carta.style.transform = '';
                    likeOverlay.style.opacity = 0;
                    dislikeOverlay.style.opacity = 0;
                }
                
                startX = null;
            }
            
            // Event listeners
            carta.addEventListener('mousedown', movimentoIniziale);
            document.addEventListener('mousemove', trascinamento);
            document.addEventListener('mouseup', movimentoFinale);
        }
        
        // Funzione per gestire uno swipe (like o dislike)
        function elaboraSwipe(carta, direzione) {
            const isLike = direzione === 'right';
            const translateX = isLike ? 1000 : -1000;
            const rotazione = isLike ? 30 : -30;
            
            carta.style.transform = `translateX(${translateX}px) rotate(${rotazione}deg)`;
            
            // Ottieni l'indice del profilo
            const profiloIndex = parseInt(carta.dataset.profiloIndex);
            const profilo = profili[profiloIndex];
            
            // Se è un like, verifica se c'è un match
            if (isLike && Math.random() > 0.7) {  // 30% probabilità di match
                mostraMatch(profilo);
            }
            
            // Dopo l'animazione, passa alla carta successiva
            setTimeout(() => {
                // Incrementa l'indice del profilo attuale
                indiceProfiloAttuale++;
                
                // Ricarica tutte le carte
                creaTutteLeCarte();
            }, 300);
        }
        
        // Funzione per mostrare il popup di match
        function mostraMatch(profilo) {
            const matchPopup = document.getElementById('matchPopup');
            const fotoProfilo = document.getElementById('fotoProfilo');
            
            // Imposta l'immagine del profilo con cui hai fatto match
            fotoProfilo.innerHTML = `<img src="./images/${profilo.foto}" alt="${profilo.nome}">`;
            
            // Mostra il popup
            matchPopup.classList.add('active');
            
            // Salva il match nel database
            $.ajax({
                url: 'operazioniData.php',
                method: 'POST',
                data: {
                    functionname: 'inserisciMatch',
                    idU: idU,
                    idProfiloMatch: profilo.id_utenti
                },
                success: function(result) {
                    // Gestione del risultato se necessario
                }
            });
        }
        
        // Event listeners per i pulsanti
        document.getElementById('likeBtn').addEventListener('click', () => {
            const activeCard = document.querySelector('.carta.active');
            if (activeCard) elaboraSwipe(activeCard, 'right');
        });
        
        document.getElementById('dislikeBtn').addEventListener('click', () => {
            const activeCard = document.querySelector('.carta.active');
            if (activeCard) elaboraSwipe(activeCard, 'left');
        });
        
        document.getElementById('continua').addEventListener('click', () => {
            document.getElementById('matchPopup').classList.remove('active');
        });
        
        document.getElementById('ricarica').addEventListener('click', () => {
            window.location.href = "match.php";
        });
        
        // Inizializza l'app
        creaTutteLeCarte();
    }
});
</script>