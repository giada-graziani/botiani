<?php
        include("conn.php");
        session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Charme</title>
</head>
<style>
body {
    background: linear-gradient(135deg, #642432 0%, #c56975 100%);
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding-top: 80px;
    padding-bottom: 20px;
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
.forma {
    background-color: rgba(248, 248, 248, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    padding: 2rem;
    margin: 2rem auto;
    max-width: 1200px;
}

h1 {
    font-size: clamp(2rem, 4vw, 2.8rem);
    margin-bottom: 2rem;
    color: white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    text-align: center;
}

.match-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.match-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

.foto {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 1rem;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.foto img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-info h5 {
    font-size: 1.5rem;
    color: white;
    margin-bottom: 0.5rem;
    text-align: center;
}

.user-info p {
    font-weight: bold;
    color: white;
    text-align: center;
    margin-bottom: 1rem;
}

.user-info span {
    font-weight: normal;
}

.btn-custom {
    background-color: #db687b;
    color: white;
    border: none;
    padding: 10px 25px;
    font-size: 1rem;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(219, 104, 123, 0.5);
    width: 100%;
    max-width: 200px;
    margin: 0 auto;
    display: block;
}

.btn-custom:hover {
    background-color: #e94e68;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(219, 104, 123, 0.6);
}

.back-link {
    background-color: #db687b;
    color: white;
    text-decoration: none;
    padding: 12px 35px;
    font-size: 1.1rem;
    border-radius: 50px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(219, 104, 123, 0.5);
    display: inline-block;
    margin-top: 2rem;
}

.back-link:hover {
    background-color: #e94e68;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(219, 104, 123, 0.6);
    text-decoration: none;
}
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
/* Responsive adjustments */
@media (max-width: 768px) {
    .main-container {
        margin: 1rem;
        padding: 1rem;
    }
    
    .foto {
        width: 120px;
        height: 120px;
    }
    
    .user-info h5 {
        font-size: 1.25rem;
    }
    
    .navbar .d-flex {
        flex-direction: column;
        gap: 0.5rem;
    }
}

@media (max-width: 576px) {
    .foto {
        width: 100px;
        height: 100px;
    }
    
    .user-info h5 {
        font-size: 1.1rem;
    }
}
</style>

<body> 
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <img src="./images/png.png" alt="Logo" width="65" height="60" class="d-inline-block align-text-top">
            <div id="navbarNav">
                <div id="navbarNav" >
                <div class="d-flex">
                    <div class="nav-item me-3">
                        <a class="nav-link" href="./profiloUtente.php"><button class="btn text-light rounded-2">Profilo</button></a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="./index.php"><button class="btn text-light rounded-2">Logout</button></a>
                    </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="forma">
            <h1>Ecco i tuoi match 💘</h1>
            
            <?php
                $query="SELECT *
                FROM matchutenti m INNER JOIN utenti u 
                ON m.id_utenteMatch=u.id_utenti INNER JOIN foto f
                ON f.id_utenti=u.id_utenti
                WHERE m.id_utenti='$_SESSION[idU]'
                GROUP BY m.id_utenteMatch";

                $risu=mysqli_query($conn,$query) or die ("connessione fallita".mysqli_error($conn));
                
                if ($risu->num_rows > 0) {
                    echo "<div class='row g-4'>";

                    while ($row = mysqli_fetch_array($risu, MYSQLI_ASSOC)) {
                        echo "<div class='col-12 col-md-6'>";
                            echo "<div class='match-card text-center'>";
                                echo "<div class='foto'>";
                                    echo "<img src='./images/$row[foto]' alt='Profile picture'>";
                                echo "</div>";
                                echo "<div class='user-info'>";
                                    echo "<h5>" . htmlspecialchars($row['nome']) . " " . htmlspecialchars($row['cognome']) . "</h5>";
                                    echo "<p>Età: <span>" . htmlspecialchars($row['eta']) . "</span></p>";
                                echo "</div>";
                                echo "<form action='profilo.php' method='POST'>";
                                    echo "<input type='hidden' name='id_utenteMatch' value='" . htmlspecialchars($row['id_utenteMatch']) . "'>";
                                    echo "<input type='submit' value='Visualizza profilo' class='btn-custom' />";
                                echo "</form>";
                            echo "</div>";
                        echo "</div>";
                    }
                    
                    echo "</div>";
                } else {
                    echo "<div class='text-center'>";
                        echo "<p style='color: white; font-size: 1.2rem;'>Non hai ancora nessun match! 😢</p>";
                        echo "<p style='color: white;'>Continua a cercare per trovare la tua anima gemella!</p>";
                    echo "</div>";
                }
            ?>
            
            <div class="text-center">
                <a href="./match.php" class="back-link">Torna a fare match</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>