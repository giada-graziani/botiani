<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>

  <style>
    form {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 15px;
    width: 600px;
    margin: 0 auto;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}
body {
    background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    color: #333;
}
.container{
    text-align:center;
    
}
.btn-group .btn{
    border-radius: 25px;
    margin: 5px;
    
    font-size: 15px;
    text-align:center;
    transition: all 0.3s ease;
    
}
.btn-group .btn:hover {
        background-color: #ff416c;
        color: white;
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
p{
    margin-top: 30px;
    font-size:16px;
}
h1 {
    text-align: center;
    color: rgb(132, 11, 15);
    padding-bottom:10px;
}

    </style>
    
<div class="container">
    <?php
    include("conn.php");
    session_start();
   if(isset($_POST['sp']) && isset($_POST['caratteristica']) && isset($_POST['animale']) && isset($_POST['bere']) && isset($_POST['fumo']) && isset($_POST['segno']) && isset($_POST['myInput'])){
    $_SESSION['qualita'][]=["sport"=> $_POST['sp'], "caratteristica"=> $_POST['caratteristica'],"animale"=> $_POST['animale'], "bere"=> $_POST['bere'], "fumo"=> $_POST['fumo'], "segno"=> $_POST['segno'], "descrizione"=> $_POST['myInput'] ];
}//vedere se metter l'if perchè non è necessario se i campi sono tutti obbligatori

    ?>
<form action="estetica.php" method="post">
    
        <!-- Sezione Hobby -->
        <h1>Cosa ti rende interessante?</h1>
        <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="hobby" id="hobby1" autocomplete="off">
            <label class="btn btn-outline-danger" for="hobby1" value="dipingo">Dipingo</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby2" autocomplete="off">
            <label class="btn btn-outline-danger" for="hobby2" value="canto">Canto</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby3" autocomplete="off">
            <label class="btn btn-outline-danger" for="hobby3" value="ballo">Ballo</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby4" autocomplete="off">
            <label class="btn btn-outline-danger" for="hobby4" value="recito">Recito</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby5" autocomplete="off">
            <label class="btn btn-outline-danger" for="hobby5" value="tv">Guardo la tv</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby6" autocomplete="off">
            <label class="btn btn-outline-danger" for="hobby6" value="dormo">Dormo</label>
        </div>

        <!-- Sezione Come ti fai sentire -->
        <p>Di solito come ti fai sentire?</p>
        <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="sentire" id="sentire1" autocomplete="off">
            <label class="btn btn-outline-danger" for="sentire1" value="messaggi">Amo i messaggi</label>
            <input type="radio" class="btn-check" name="sentire" id="sentire2" autocomplete="off">
            <label class="btn btn-outline-danger" for="sentire2" value="telefono">Sto ore al telefono</label>
            <input type="radio" class="btn-check" name="sentire" id="sentire3" autocomplete="off">
            <label class="btn btn-outline-danger" for="sentire3" value="videochiamate">Preferisco le videochiamate</label>
            <input type="radio" class="btn-check" name="sentire" id="sentire4" autocomplete="off">
            <label class="btn btn-outline-danger" for="sentire4" value="noM">Non so messaggiare</label>
            <input type="radio" class="btn-check" name="sentire" id="sentire5" autocomplete="off">
            <label class="btn btn-outline-danger" for="sentire5" value="vivo">Preferisco vederci dal vivo</label>
        </div>

        <!-- Sezione Come esprimi l'amore -->
        <p>Come esprimi il tuo amore?</p>
        <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="esprimi" id="esprimi1" autocomplete="off">
            <label class="btn btn-outline-danger" for="esprimi1" value="gesti">Gesti significativi</label>
            <input type="radio" class="btn-check" name="esprimi" id="esprimi2" autocomplete="off">
            <label class="btn btn-outline-danger" for="esprimi2" value="regali">Tanti regali</label>
            <input type="radio" class="btn-check" name="esprimi" id="esprimi3" autocomplete="off">
            <label class="btn btn-outline-danger" for="esprimi3" value="contatto">Contatto fisico</label>
            <input type="radio" class="btn-check" name="esprimi" id="esprimi4" autocomplete="off">
            <label class="btn btn-outline-danger" for="esprimi4" value="complimenti">Facendo i complimenti</label>
        </div>

        <!-- Scelta finale -->
        <div class="card-body">
    <h5 class="card-title">Complimenti! Hai quasi completato il tuo profilo Charme!</h5>
    <p class="card-text">Adesso puoi continuare inserendo le tue caratteristiche estetiche o definire cosa cerchi in una persona:</p>
            <button type="submit" class="btn">Clicca qui per inserire caratteristiche estetiche</button>
            <a href="interessi.php"><button type="button" class="btn">Clicca qui per definire cosa cerchi</button></a>
  </div>
      
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>