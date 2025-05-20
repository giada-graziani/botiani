<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">   
     <link rel="stylesheet" href="style2.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
    <title>Charme</title>
</head>
<style>
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
        color: #722c44;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        text-align:center;
    }
    label{
    color: #6e446b;
    font-weight: bold;
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
        
    }
    a:hover {
        background-color: #e94e68;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(219, 104, 123, 0.6);
    }
    .foto{
        
        width: 250px; 
        height: 250px;
        overflow: hidden;
        border-radius: 50%;
        background-color: #f0f0f0;
    }
    .utente{
        text-align:left;
        padding:30px;
    }
    .nome{
        color:rgba(170, 62, 83, 0.77);
        font-size:40px;
        font-weight:bold;

    }
    .dati{
        color:#db687b;
        font-size:18px;
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
<body>
    <div class="container">
        <form> 
            <h1>Il tuo charme✨</h1>
            <?php
        include("conn.php");
        session_start();
            $query="SELECT *
                    FROM utenti u 
                    INNER JOIN foto f
                        ON f.id_utenti=u.id_utenti 
                    INNER JOIN carattaggiuntive c 
                        ON u.id_utenti=c.id_utenti 
                    INNER JOIN qualita q
                        ON u.id_utenti=q.id_utenti 
                    INNER JOIN interessi i
                        ON u.id_utenti=i.id_utenti 
                    INNER JOIN hobby h
                        ON u.id_utenti=h.id_utenti
                    WHERE u.id_utenti='$_SESSION[idU]'";
            $risu=mysqli_query($conn,$query)or die ("connessione fallita".mysqli_error($conn));
            //style='width:50%;height:20%;'
            if($risu->num_rows>0){
                while($row=mysqli_fetch_array($risu, MYSQLI_ASSOC)){
            echo "<div class='foto'>";
            echo "<img src='./images/$row[foto]' class='card-img-top'>";
            echo "</div>";

            echo "<div class='utente'>";
            echo "<div class='nome'>";
            echo "<p>".$row['nome']." ".$row['cognome']."<p>";
            echo "</div>";

            echo "<div class='dati'>";
            echo "<p>".$row['eta']." "."anni</p>";
            echo "<span class='material-symbols-outlined'>mail</span>";
            echo "<p>".$row['email']."</p>";

            echo "<span class='material-symbols-outlined'>call</span>";
            echo "<p>".$row['num_telefono']."</p>";

            echo "<span style='font-weight:bold';>Segno zodiacale</span>"; 
            echo "<p>".$row['zodiaco']."</p>";

            echo "<span style='font-weight:bold';>Sport</span>"; 
            echo "<p>".$row['sport']."</p>";

            echo "<span style='font-weight:bold';>Carattere</span>"; 
            echo "<p>".$row['carattere']."</p>";

            echo "<span style='font-weight:bold';>Colore di capelli</span>"; 
            echo "<p>".$row['capelli']."</p>";

            echo "<span style='font-weight:bold';>Colore degli occhi</span>"; 
            echo "<p>".$row['occhi']."</p>";

            echo "<span style='font-weight:bold';>Altezza</span>"; 
            echo "<p>".$row['altezza']."</p>";

            echo "<span style='font-weight:bold';>Stile</span>"; 
            echo "<p>".$row['stile']."</p>";

                echo "<span style='font-weight:bold';>Sta cercando ?</span>"; 
            echo "<p>".$row['relazione']."</p>";

                echo "<span style='font-weight:bold';>Esprime il suo interesse con...</span>"; 
            echo "<p>".$row['esprimiAm']."</p>";

                echo "<span style='font-weight:bold';>Per approcciare...</span>"; 
            echo "<p>".$row['sentire']."</p>";

                echo "<span style='font-weight:bold';>Nel partner sta cercando...</span>"; 
            echo "<p>".$row['caratterePartner']."</p>";

                echo "<span style='font-weight:bold';>Nel tempo libero...</span>"; 
            echo "<p>".$row['descrizione']."</p>";

                echo "<span style='font-weight:bold';>Si definisce</span>"; 
            echo "<p>".$row['descrizionePersona']."</p>";
            echo  "</div>";
            echo "</div>";


            echo "<div class='footer'>";
            echo "<a href='./match.php'>Torna al match</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            
                }
            echo "</div>";
            }

            ?>
        </form>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>