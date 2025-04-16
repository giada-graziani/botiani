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
            <!--GIADA-->
            <h1>Completa la tua descrizione</h1>
        </div>
        <div>
        <form action="interessi.php" method="post">
            <label for="coloriOcchi">Colore degli occhi: </label>
            <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="coloriOcchi">
                <input type="radio" class="btn-check" name="optionsOcchi" id="option1O" autocomplete="off" checked>
                <label class="btn btn-danger" for="option1O">Marroni</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option2O" autocomplete="off">
                <label class="btn btn-danger" for="option2O">Grigi</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option3O" autocomplete="off">
                <label class="btn btn-danger" for="option3O">Verdi</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option4O" autocomplete="off">
                <label class="btn btn-danger" for="option4O">Neri</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option5O" autocomplete="off">
                <label class="btn btn-danger" for="option5O">Blu</label>

                <input type="radio" class="btn-check" name="optionsOcchi" id="option6O" autocomplete="off">
                <label class="btn btn-danger" for="option6O">Azzurri</label>
            </div>
            <br>
            <br>
            <label for="coloriCapelli">Colore dei capelli: </label>
            <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="coloriCapelli">
                <input type="radio" class="btn-check" name="optionsCapelli" id="option1C" autocomplete="off" checked>
                <label class="btn btn-danger" for="option1C">Castani</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option2C" autocomplete="off">
                <label class="btn btn-danger" for="option2C">Mori</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option3C" autocomplete="off">
                <label class="btn btn-danger" for="option3C">Biondi</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option4C" autocomplete="off">
                <label class="btn btn-danger" for="option4C">Rossi</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option5C" autocomplete="off">
                <label class="btn btn-danger" for="option5C">Neri</label>

                <input type="radio" class="btn-check" name="optionsCapelli" id="option6C" autocomplete="off">
                <label class="btn btn-danger" for="option6C">Altro</label>
            </div>
            <br>
            <br>
            <label for="altezze">Qual'e la tua altezza?(in centimetri): </label>
            <input type="number" id="altezze" name="altezza" min="120" max="300">
            <br>
            <br>
            <label for="stili">Quale stile ti rappresenta di più? : </label>
            <div class="btn-group btn-group-sm" role="group" aria-label="Gruppo di bottoni toggle" name="stili">
                <input type="radio" class="btn-check" name="optionStili" id="option1S" autocomplete="off" checked>
                <label class="btn btn-danger" for="option1S">Baggy</label>

                <input type="radio" class="btn-check" name="optionStili" id="option2S" autocomplete="off">
                <label class="btn btn-danger" for="option2S">Casual</label>

                <input type="radio" class="btn-check" name="optionStili" id="option3S" autocomplete="off">
                <label class="btn btn-danger" for="option3S">Elegante</label>

                <input type="radio" class="btn-check" name="optionStili" id="option4S" autocomplete="off">
                <label class="btn btn-danger" for="option4S">Streetwear</label>

                <input type="radio" class="btn-check" name="optionStili" id="option5S" autocomplete="off">
                <label class="btn btn-danger" for="option5S">Goth</label>

                <input type="radio" class="btn-check" name="optionStili" id="option6S" autocomplete="off">
                <label class="btn btn-danger" for="option6S">Sportivo</label>
            </div>       
        </div>
        <div>
            <input type="submit" value="Continua">
        </form>
        </div>
    </div>
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>