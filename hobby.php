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
    
body {
    background: linear-gradient(135deg, #642432 0%, #c56975 100%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}
body > .container{
    background-color: rgba(248, 248, 248, 0.747);
    backdrop-filter: blur(10px);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    width: 90%;
    margin: 30px 20px 30px 20px;
    max-width: 600px;
    text-align: center;
    animation: scaleIn 0.8s ease-out;
}

<<<<<<< HEAD
=======
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
>>>>>>> 5c0ea5892d0f7acdd016fafc5b9bb9daf07fbb6d
p{
    font-size:13px;
    text-align:center;
    font-style:italic;
    color:#6e446b;
}
h1 {
    font-size: 2.8rem;
    margin-bottom: 10px;
    color: #722c44;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}
h5{
    text-align:center;
    font-style:italic;
    color:#6e446b;
}
label{
   color: #6e446b;
   font-weight: bold;
   padding-top:18px;
}

.btn-check:checked + .btn {
  background-color: #e94e68; /* Rosa chiaro quando selezionato */
  color: white;
  border:none;
}
.btn-group .btn{
      border-radius: 25px;
      font-size: 13px;
      text-align:center;
      transition: all 0.3s ease;
      background-color:rgb(225, 175, 177); /* Beige caldo */
    color: #6e446b; /* Colore del testo che si abbina allo sfondo */
    border: 1px solid #e1b7b7; /* Bordi dello stesso colore */
    }

/* Rimuovi il margine sull'ultimo bottone per evitare uno spazio extra */
.btn-group .btn:last-child {
    margin-right: 0;
}

/* Hover: Cambia il colore quando si passa sopra */
.btn-group .btn:hover {
    background-color:#db687b ; /* Un rosa chiaro per l'effetto hover */
    color: #fff; /* Cambia il colore del testo al passaggio */
}


/* Focus (per quando il bottone è selezionato) */
.btn-group .btn:focus {
    outline: none;
    box-shadow: 0 0 5px 2px rgba(200, 100, 120, 0.6); /* Sfumatura rosa per il focus */
}

input[type="submit"] {
    background-color:#db687b;
    color: white;
    border: none;
    padding: 12px 35px;
    font-size: 1.1rem;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(219, 104, 123, 0.5);
    margin: 10px 0;
}
input[type="submit"]:hover {
    background-color: #e94e68;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(219, 104, 123, 0.6);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
 
@keyframes scaleIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
}
 
/* Responsive */
@media (max-width: 768px) {
    body > form {
        width: 95%;
        margin: 30px 20px 30px 20px;
    }
   
   h1 {
        font-size: 2.5rem;
    }
   
    
}

</style>
<?php
    include("conn.php");
    session_start();
   if(isset($_POST['sp']) && isset($_POST['caratteristica']) && isset($_POST['animale']) && isset($_POST['bere']) && isset($_POST['fumo']) && isset($_POST['segno']) && isset($_POST['myInput'])){
    $_SESSION['qualita'][]=["sport"=> $_POST['sp'], "caratteristica"=> $_POST['caratteristica'],"animale"=> $_POST['animale'], "bere"=> $_POST['bere'], "fumo"=> $_POST['fumo'], "segno"=> $_POST['segno'], "descrizione"=> $_POST['myInput'] ];
}//vedere se metter l'if perchè non è necessario se i campi sono tutti obbligatori

?>
<div class="container">
    
<form action="interessi.php" method="post">
    
        <!-- Sezione Hobby -->
        <h1>Cosa ti rende interessante?</h1>

        <label for="gr">Quale di questi hobby ti piace di più?</label>
        <div class="btn-group" id="gr" role="group">
            <input type="radio" class="btn-check" name="hobby" id="hobby1" autocomplete="off">
<<<<<<< HEAD
            <label class="btn" for="hobby1" value="dipingo">Dipingere</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby2" autocomplete="off">
            <label class="btn" for="hobby2" value="canto">Cantare</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby3" autocomplete="off">
            <label class="btn" for="hobby3" value="ballo">Ballare</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby4" autocomplete="off">
            <label class="btn" for="hobby4" value="recito">Recitare</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby6" autocomplete="off">
            <label class="btn" for="hobby6" value="dormo">Dormire</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby7" autocomplete="off">
            <label class="btn" for="hobby6" value="dormo">Leggere</label>
=======
            <label class="btn" for="hobby1" value="dipingo">Dipingo</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby2" autocomplete="off">
            <label class="btn" for="hobby2" value="canto">Canto</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby3" autocomplete="off">
            <label class="btn" for="hobby3" value="ballo">Ballo</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby4" autocomplete="off">
            <label class="btn" for="hobby4" value="recito">Recito</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby5" autocomplete="off">
            <label class="btn" for="hobby5" value="tv">Guardo la tv</label>
            <input type="radio" class="btn-check" name="hobby" id="hobby6" autocomplete="off">
            <label class="btn" for="hobby6" value="dormo">Dormo</label>
>>>>>>> 5c0ea5892d0f7acdd016fafc5b9bb9daf07fbb6d
        </div>

        <!-- Sezione Come ti fai sentire -->
        <label for="group">Di solito come ti fai sentire?</label>
        <div class="btn-group" id="group" role="group">
            <input type="radio" class="btn-check" name="sentire" id="sentire1" autocomplete="off">
            <label class="btn" for="sentire1" value="messaggi">Amo i messaggi</label>
            <input type="radio" class="btn-check" name="sentire" id="sentire2" autocomplete="off">
            <label class="btn" for="sentire2" value="telefono">Sto ore al telefono</label>
            <input type="radio" class="btn-check" name="sentire" id="sentire3" autocomplete="off">
            <label class="btn" for="sentire3" value="videochiamate">Preferisco le videochiamate</label>
            <input type="radio" class="btn-check" name="sentire" id="sentire4" autocomplete="off">
            <label class="btn" for="sentire4" value="noM">Non so messaggiare</label>
            <input type="radio" class="btn-check" name="sentire" id="sentire5" autocomplete="off">
            <label class="btn" for="sentire5" value="vivo">Preferisco vederci dal vivo</label>
        </div>

        <!-- Sezione Come esprimi l'amore -->
        <label for="group2">Come esprimi il tuo amore?</label>
        <div class="btn-group" id="group2" role="group">
            <input type="radio" class="btn-check" name="esprimi" id="esprimi1" autocomplete="off">
            <label class="btn" for="esprimi1" value="gesti">Gesti significativi</label>
            <input type="radio" class="btn-check" name="esprimi" id="esprimi2" autocomplete="off">
            <label class="btn" for="esprimi2" value="regali">Tanti regali</label>
            <input type="radio" class="btn-check" name="esprimi" id="esprimi3" autocomplete="off">
            <label class="btn" for="esprimi3" value="contatto">Contatto fisico</label>
            <input type="radio" class="btn-check" name="esprimi" id="esprimi4" autocomplete="off">
            <label class="btn" for="esprimi4" value="complimenti">Facendo i complimenti</label>
        </div>

        <input type="submit" value="Avanti"/>
      
      
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>