<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
</head>
<body>
    <div>
        <div>
            <!--GIADA-->
            <h1>Benvenuto in Charme</h1>
        </div>
        <div>
            <h5>Il sito di incontri pensata per chi cerca più di un semplice match:<br>un’esperienza sofisticata, autentica e coinvolgente</h5>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Login</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <form action="funzioni.php" method="post">-->
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="emails" required>
                                <label for="emails">Email address</label>
                            </div>
                        </div>
                        <div class="mb-3">
                        <div class="form-floating">
                                <input type="password" class="form-control" name="password" id="pws" required>
                                <label for="pws">Password</label>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="conferma">Accedi</button>
                    <!--<input type="submit" value="Accedi">
                    </form>-->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
<script type=text/javascript>
    $(document).ready(function(){ //quando la pagina è pronta 
    
        $("#conferma").click(function(){
            const email= document.getElementById("emails").value;
            const pws= document.getElementById("pws").value;
           
            console.log(email)
            console.log(pws);

            $.ajax(
                {url: "operazioniData.php",
                data: "functionname=login&email="+email+"&pws="+pws,   
                method:"POST",
                dataType: "JSON",
                success: function(result){
                    if(result.esito =='successo'){
                        window.location("match.php");
                    }
                    else{
                        alert("Credenziali errate. Riprova.");
                        window.location.reload();
                    }
                    
                    }
                }
            );
        });
    });
</script>