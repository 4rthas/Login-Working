<!-- avoid access to this page if user not connected -->
<?php 
    // starts session
    session_start();

    // check if key is empty
    if(empty($_SESSION['connectedUser'])){
        // if user not connected, redirect to index.php
        header("Location: index.php");
        // to be sure code stop
        die();
    }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Page utilisateur logué</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
<body>
    <div id="app">
        <header id="header">
            <h1 id="app-title"><a href="#">Utilisateur logué</a></h1>
            <nav id="nav">
                <a href="./">Accueil</a>
                <a href="#">Profil</a>
                <a href="#">À propos</a>
                <a href="protected.php">Protégée !</a>
                <?php if (!empty($_SESSION['connectedUser'])): ?>
                    <a href="deconnexion.php">Déconnexion</a>
                <?php endif; ?>
            </nav>
        </header>
    </div>
    
</body>
</html>