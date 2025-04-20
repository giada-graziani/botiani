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
    ?>
    <div>
        <div>
            <!--GIADA-->
            <h1>Forma il tuo profilo</h1>
        </div>
        <div>
        <form action="qualita.php" method="post">
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
            <label for="telefoni">Dacci il tuo numero di telefono :</label>
            <input type="tel" id="telefono" name="telefoni" required>
            <br>
            <br>
            <label for="sessi">Qual è il tuo genere? :</label>
            <input list="sesso" name="sessi" required>

            <datalist id="sesso">
                <option value="donna">
                <option value="uomo">
                <option value="altro">
            </datalist>
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
            <a href="index.php"><button>Annulla</button></a>
        </div>
    </div>
    <?php
    //CREARE ARRAY SESSION
    ?>

<script>
document.getElementById("nomi").addEventListener("focus", function() {
    // Mostra il messaggio (div) quando si fa clic sulla casella di testo
    document.getElementById("message1").style.display = "block";
});
document.getElementById("cognomi").addEventListener("focus", function() {
    // Mostra il messaggio (div) quando si fa clic sulla casella di testo
    document.getElementById("message2").style.display = "block";
});
</script>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>