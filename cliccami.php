<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
</head>
<body>
    <?php
        require("conn.php");
        session_start();
        if (!isset($_SESSION['utente'])) {
            $_SESSION['utente'] = [];
        }
    ?>
    <div class="contenitore">
        <div  class="header">
            <!--GIADA-->
            <h1>Crea il tuo profilo <span style="font-size: 2rem;">💘</span></h1>
        </div>
        <div>
        <form action="qualita.php" method="post" class="formCliccami">
            <label for="nomi">Come ti chiami? : </label>
            <input type="text" name="nome" id="nomi" required>
            <div class="message" id="message1">
                <small><strong>Attenzione! così è come apparirà sul profilo e non potrai più cambiarlo</strong></small>
            </div>
            <br>
            <br>

            <label for="cognomi">Qual è il tuo cognome? :</label>
            <input type="text" name="cognome" id="cognomi" required>
            <div class="message" id="message2">
            <small><strong>Attenzione! così è come apparirà sul profilo e non potrai più cambiarlo</strong></small>
            </div>
            <br>
            <br>
            
            <label for="age">Inserisci la tua età:</label>
            <input type="number" name="eta" id="age" min="18" required>
            <br>
            <br>
            <label for="telefoni">Dacci il tuo numero di telefono:</label>
            <input type="tel" id="telefoni" name="telefono" pattern="[0-9]{10}" 
           maxlength="10" 
           title="Inserisci esattamente 10 cifre numeriche" 
           required>
            <br>
            <br>
            <label for="sessi">Qual è il tuo sesso? :</label>
            <select id="sessi" name="sesso" required>
                <option value="uomo">Uomo</option>
                <option value="donna">Donna</option>
                <option value="altro">Altro</option>
            </select>
            <br>
            <br>
            <label for="emails">Inserisci la tua email:</label>
            <input type="email" name="email" id="emails" required>
            <br>
            <br>
            <label for="pwd">Inserisci la tua password:</label>
            <input type="password" name="password" id="pwd" required>
        </div>
        <div>
            <input type="submit" value="Crea">
        </form>
            <a href="index.php" class="annulla"><button class="annulla">Annulla</button></a>
        </div>
    </div>
<script>
document.getElementById("nomi").addEventListener("focus", function() {
    // Mostra il messaggio (div) quando si fa clic sulla casella di testo
    document.getElementById("message1").style.display = "block";
});
document.getElementById("cognomi").addEventListener("focus", function() {
    // Mostra il messaggio (div) quando si fa clic sulla casella di testo
    document.getElementById("message2").style.display = "block";
});


document.addEventListener('DOMContentLoaded', function() {
    // Riferimento all'input e al messaggio di errore
    const telefonoInput = document.getElementById('telefoni');
    const etaInput = document.getElementById('age');
    
    if (telefonoInput) {
        // Impedisci l'inserimento di caratteri non numerici
        telefonoInput.addEventListener('keypress', function(e) {
            // Ottieni il carattere dalla tastiera
            const char = String.fromCharCode(e.charCode);
            
            // Permetti solo numeri (0-9)
            if (!/^[0-9]$/.test(char)) {
                e.preventDefault(); // Impedisci l'inserimento
            }
        });
    }
    
    if (etaInput) {
        // Controlla il numero quando l'utente modifica il valore di etaInput
        etaInput.addEventListener('change', function() {
            //il valore dell'input(this.value) è a base decimale
            const eta = parseInt(this.value, 10);
            // isNaN(eta) controlla se il valore non è un numero
        if (isNaN(eta) || eta < 18 || eta > 99) {
            alert('L\'età deve essere compresa tra 18 e 99');
            this.value = ''; // Cancella il valore non valido
        }
        });
    

    }
});

</script>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>