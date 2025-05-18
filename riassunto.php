<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Charme</title>
</head>
<style>
    form {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 30px;
    border-radius: 15px;
    width: 600px;
    margin: 0 auto;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
<<<<<<< HEAD

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
h1 {
    font-size: 2.8rem;
    margin-bottom: 10px;
    /*color: #722c44;*/
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
   </style> 
<body> 
    <form action='profilo.php' method='POST'>
    <div>

    <h1>Ecco i tuoi match 💘</h1>
   

    <?php
    include("conn.php");
    session_start();
    $query="SELECT *
     FROM matchutenti m INNER JOIN utenti u 
      ON m.id_utenteMatch=u.id_utenti INNER JOIN foto f
      ON f.id_utenti=u.id_utenti
      WHERE m.id_utenti='$_SESSION[idU]'
      GROUP BY m.id_utenteMatch";
    $risu=mysqli_query($conn,$query)or die ("connessione fallita".mysqli_error($conn));
    
    if($risu->num_rows>0){
       echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";

        while($row=mysqli_fetch_array($risu, MYSQLI_ASSOC)){

    echo "<div class='card' style='width: 15rem;'>";
       echo "<div class='card-body'>";

       echo "<div class=foto>";
       echo "<img src='./images/$row[foto]' class='card-img-top'>";
       echo "</div>";

       echo "<div class='utente'>";
       echo "<h5 class='card-title' style='color:white;'>".$row['nome']." ".$row['cognome']."</h5>";
       echo "<p class='card-text'style='font-weight:bold;color:white'> eta'<span style='font-weight:normal;'>: ".$row['eta']."</span></p>";
       echo "</div>";


       echo "<div class='footer'>";
       echo "<input type='hidden' name='id_utenteMatch' value='".$row['id_utenteMatch']."'>";
       echo "<input type='submit' value='Visualizza profilo'/>";
       echo "</div>";
       echo "</div>";
       echo "</div>";
   
        }
       
        echo "</div>";
    }
    ?>

  </div>
  <div class="indietro">
  <a href="./match.php">Torna a fare match</a>
</div>
</form>

=======
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
        h1 {
            text-align: center;
            color: rgb(132, 11, 15);
            padding-bottom:10px;
            margin-bottom:25px;
        }
    
        .card{
            background: #ff9a9e;
          
            margin:15px 25px 25px 15px;
            text-align:left;
        }
       h5{
        font-style:italic;
        font-size:28px;
        color:rgb(162, 0, 5);
       }
      
   </style> 
<body>
    <div>
<form>
    <h1>Ecco i tuoi match</h1>

    <?php
    include("conn.php");
    $query="SELECT * FROM utenti";//da fare con la tabella match
    $risu=mysqli_query($conn,$query)or die ("connessione fallita".mysqli_error($conn));
    if($risu->num_rows>0){
       echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";
        while($row=mysqli_fetch_array($risu, MYSQLI_ASSOC)){
        echo "<div class='card' style='width: 15rem;'>";
       echo "<div class='card-body'>";
       echo "<img src='...' class='card-img-top' alt='...'>";
       echo "<h5 class='card-title'>".$row['nome']." ".$row['cognome']."</h5>";
       echo "<p class='card-text'>"."<p style='font-weight:bold;'> emai: </p>".$row['email']."</p>";
       echo "<p class='card-text'>"."<p style='font-weight:bold;'> numero di telefono: </p>".$row['num_telefono']."</p>";
       echo "<p class='card-text'>"."<p style='font-weight:bold;'> sesso: </p>".$row['sesso']."</p>";
       echo "<a href='#' class='btn btn-primary'>Go somewhere</a>";
       echo "</div>";
       echo "</div>";
       
        }
        echo "</div>";
    }
    ?>
   
  </div>
</div>
</form>

</div>
>>>>>>> 5c0ea5892d0f7acdd016fafc5b9bb9daf07fbb6d
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>