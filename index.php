<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
    
    <!-- Bootstrap CSS prima del CSS personalizzato -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    
    <!-- CSS personalizzato dopo Bootstrap -->
    <link rel="stylesheet" href="style.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
</head>
<body>
    <div id="contenitoreIndex">
        <div class="header">
            <h1>Benvenuto in Charme</h1>
        </div>
        <div>
            <h5>Il sito di incontri pensato per chi cerca più di un semplice match:<br>un'esperienza sofisticata, autentica e coinvolgente</h5>
        </div>
        <div>
            <!-- Pulsante per aprire il modal -->
            <button type="button" id="loginIndex" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>

            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Login</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="loginForm" method="post" action="cercaId.php">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" id="emails" required>
                                        <label for="emails">Email address</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="passwords" required>
                                        <label for="passwords">Password</label>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input id="conferma" type="submit" value="Accedi">
                            </form>
                            <button type="button" id="chiudi" data-bs-dismiss="modal">Chiudi</button>
                        </div>
                    </div>
                </div>
            </div>
            <a href="cliccami.php"><p>non sei ancora registrato?Cliccami!</p></a>
        </div>  
    </div>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>