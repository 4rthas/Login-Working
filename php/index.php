<?php 
  // start session
  session_start();

  // default value for theme
  $theme = "light";
  // if there is cookie
  if (!empty($_COOKIE["user_theme"])){
    // store cookie value
    $theme = $_COOKIE["user_theme"];
  }


  // check if login form submitted
  if (!empty($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // retrieve user based username
    require("users.php");
    foreach($users as $usernameFromDb => $userInfo){
      // if user found
      if ($username === $usernameFromDb){
        // check password, isPasswordOK is a boolean
        $isPasswordOK = password_verify($password, $userInfo['pass']);

        // if password is good
        if ($isPasswordOK){
          // user is connected
          // username stored in dedicated key
          $_SESSION['connectedUser'] = $usernameFromDb;

          // redirect to protected page
          header("Location: protected.php");
          die(); // alias of exit
        }
      }
    }
  }

?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
<!-- class for theme choosen -->
  <body class="<?= $theme ?>">
    <div id="app">
      <header id="header">
        <h1 id="app-title"><a href="#">Login</a></h1>

        <!--  store user connected -->
        <?php
          if (!empty($_SESSION['connectedUser'])) {
            $userConnected=$_SESSION['connectedUser'];
          }else{
            $userConnected='';
          }
        ?>
        
        <!-- display user connected or nothing than bienvenue-->
        <p>Bienvenue <?=$userConnected?> !</p>

        <!-- form for theme switcher -->
        <form action="../php/switch-theme.php" id="theme-switcher-form">
          <select name="theme" id="theme-switcher-select">
            <option value="light" <?= ($theme === "light") ? "selected" : "" ?>>Thème normal</option>
            <option value="dark" <?= ($theme === "dark") ? "selected" : "" ?>>Thème sombre</option>
          </select>
        </form>

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
      <div id="login">
        <form action="" id="login-form" method="post" autocomplete="off">
          <div id="form-title">
            Connexion
          </div>
          <div class="field">
            <label class="field-label" for="field-username">Identifiant</label>
            <input class="field-input" id="field-username" name="username" type="text" placeholder="Identifiant"/>
            <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
          </div>
          <div class="field">
            <label class="field-label" for="field-password">Mot de passe</label>
            <input class="field-input" id="field-password" name="password" type="password" placeholder="Mot de passe"/>
            <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
          </div>
          <div id="errors">
          </div>
          <button id="login-submit">Connexion</button>
        </form>
      </div>
      <footer id="footer">
        Rejoignez-nous
      </footer>
    </div>
    <script src="../js/app.js"></script>
  </body>
</html>