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
            <h1>Completa la tua descrizione</h1>
        </div>
        <div>
        <form action="interessi.php" method="post">
            <label for="coloriOcchi">Colore degli occhi: </label>
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
            <label for="coloriCapelli">Colore dei capelli: </label>
                <input list="capello" name="coloriCapelli" required>
                <datalist id="capello">
                    <option value="Castani">
                    <option value="Biondi">
                    <option value="Mori">
                    <option value="Grigi">
                    <option value="Nero">
                    <option value="Rossi">
                    <option value="Altro">
                </datalist>
            <br>
            <br>
            <label for="altezze">Qual'e la tua altezza?(in centimetri): </label>
            <input type="number" id="altezze" name="altezza" min="120" max="300">
            <br>
            <br>
            <label for="stili">Quale stile ti rappresenta di più? : </label>
                <input list="stile" name="stili" required>
                <datalist id="stile">
                    <option value="Baggy">
                    <option value="Casual">
                    <option value="Elegante">
                    <option value="Streetwear">
                    <option value="Goth">
                    <option value="Sportivo">
                </datalist>       
        </div>
        <div>
            <input type="submit" value="Continua">
        </form>
        </div>
    </div>
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>