<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
</head>
<body>
    <?php
        require("conn.php");
    ?>
    <div>
        <div>
            <h1>Che Charme stai cercando?</h1>
            <h5>bravo!! hia completato la tua descrizione ora pensa a cosa cerchi in una persona</h5>
        </div>
        <div>
        <label for="generi">A che genere sei interessato:</label>
            <input list="genere" name="generi" required>
            <datalist id="genere">
                <option value="donna">
                <option value="uomo">
                <option value="entrambi">
            </datalist>
        <br>
        <label for="relazioni">Che tipo di relazione stai cercando?</label>
            <input list="relazione" name="relazioni" required>
            <datalist id="relazione">
                <option value="seria">
                <option value="non lo so">
                <option value="divertimento">
                <option value="amicizia">
            </datalist>
        <br>
        <label for="caratteristiche">Qual’e la caratteristica più importante che stai cercando?</label>
        <input type="text" name="caratteristica" id="caratteristiche">
        <br>
        <form action="interessi.php" method="post">
            <label for="coloriOcchi">che colore di occhi ti attrae? </label>
                <input list="occhio" name="coloriOcchi" required>
                <datalist id="occhio">
                    <option value="Marroni">
                    <option value="Grigi">
                    <option value="Verdi">
                    <option value="Neri">
                    <option value="Blu">
                    <option value="Azzurri">
                </datalist>
            <br>
            <br>
            <label for="coloriCapelli">E per quanto riguarda i capelli? </label>
                <input list="capello" name="coloriCapelli" required>
                <datalist id="capello">
                    <option value="Castani">
                    <option value="Biondi">
                    <option value="Mori">
                    <option value="Grigi">
                    <option value="Nero">
                    <option value="Rossi">
                </datalist>
        </div>
        <div>
            <input type="submit" value="Accedi">
        </form>
            <a href="index.php"><button>Annulla</button></a>
        </div>
    </div>
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>