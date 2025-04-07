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
            <h1>Accedi al tuo Charme</h1>
        </div>
        <div>
        <form action="match.php" method="post">
            <label for="emails">Inserisci la tua email:</label>
            <input type="email" name="email" id="emails" required>
            <br>
            <label for="pwd">Inserisci la tua password:</label>
            <input type="password" name="password" id="pwd" required>
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