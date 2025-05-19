<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Charme</title>
</head>
<style>

/* Stili per la navbar */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    background-color: rgba(100, 36, 50, 0.9) !important;
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.navbar-brand {
    color: white !important;
    font-weight: bold;
    font-size: 1.5rem;
}

.navbar-nav .nav-link {
    color: white !important;
    margin: 0 10px;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #db687b !important;
}

/* Aggiunta del padding per non sovrapporre la navbar */
body {
    background: linear-gradient(135deg, #642432 0%, #c56975 100%);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding-top: 100px; /* Spazio per la navbar */
    padding-bottom: 20px;
}

/* Container principale che contiene tutto il contenuto */
.main-content {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-grow: 1;
}

form {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 15px;
    width: 600px;
    margin: 20px auto;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
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

h1 {
    font-size: 2.8rem;
    margin-bottom: 10px;
    color:white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    text-align:center;
}

.card{
    background: transparent;
    margin:15px 25px 25px 15px;
    text-align:left;
    border:none;
}

h5{
    font-size:28px;
    color:rgb(162, 0, 5);
}

.utente{
    height:80px;
    padding-top:15px;
    text-align:left;
    width:500px;
}

.footer{
    text-align:center;
    padding-top:20px;
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

.foto{
    text-align:left;
    width: 250px; 
    height: 250px;
    overflow: hidden;
    border-radius: 50%;
    background-color: #f0f0f0;
}

a{
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
    text-decoration:none;
    text-align:center;
}

a:hover {
    background-color: #e94e68;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(219, 104, 123, 0.6);
}

.indietro{
    text-align:center;
}

/* Responsive */
@media (max-width: 768px) {
    body {
        padding-top: 80px;
    }
    
    form {
        width: 95%;
        margin: 10px auto;
    }
}
</style> 

<body> 
<?php
    include("conn.php");
    session_start();
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="./images/png.png" alt="Logo" width="65" height="60" class="d-inline-block align-text-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./profiloUtente.php">Profilo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenuto principale -->
<div class="main-content">
    <form action='profilo.php' method='POST'>
        <div>
            <h1>Ecco i tuoi match 💘</h1>
            <?php
                $q="SELECT *
                FROM matchutenti m INNER JOIN utenti u 
                ON m.id_utenteMatch=u.id_utenti INNER JOIN foto f
                ON f.id_utenti=u.id_utenti
                WHERE m.id_utenti='$_SESSION[idU]'
                GROUP BY m.id_utenteMatch";
                $ris=mysqli_query($conn,$q)or die ("connessione fallita".mysqli_error($conn));
                
                if($ris->num_rows>0){
                    echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";

                    while($row=mysqli_fetch_array($ris, MYSQLI_ASSOC)){

                        echo"<div class='card' style='width: 15rem;'>
                            <div class='card-body'>

                            <div class=foto>
                            <img src='./images/$row[foto]' class='card-img-top'>
                            </div>

                            <div class='utente'>
                            <h5 class='card-title' style='color:white;'>".$row['nome']." ".$row['cognome']."</h5>
                            <p class='card-text'style='font-weight:bold;color:white'> eta'<span style='font-weight:normal;'>: ".$row['eta']."</span></p>
                            </div>

                            <div class='footer'>
                            <input type='hidden' name='id_utenteMatch' value='".$row['id_utenteMatch']."'>
                            <input type='submit' value='Visualizza profilo'/>
                            </div>
                            </div>
                            </div>";
                            }
                            echo "</div>";
                        }
            ?>

        </div>
        <div class="indietro">
            <a href="./match.php">Torna a fare match</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>