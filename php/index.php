<?php 

  // check if cookie is set (when them form is sent)
  if( isset($_COOKIE['theme-switcher-cookie-key'])){
    $theme = $_COOKIE['theme-switcher-cookie-key'];

  } else {
    $theme = '';
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<!-- theme class dynamic -->
<body class="<?= $theme ?>">
  <div id="app">
    <header id="header">
      <h1 id="app-title"><a href="#">Login</a></h1>
      <nav id="nav">
        <a href="./">Accueil</a>
        <a href="#">Profil</a>
        <a href="#">À propos</a>
        <a href="#">FAQ</a>
        <a href="#">Contact</a>
      </nav>
    </header>
    <div id="login">

      <!-- THEME SWITCHER -->
      <form action="themeSwitcher.php" method="GET" id="theme-switcher-form">
      <!-- values passed to select theme-switcher -->
        <select name="theme-switcher" id="theme-switcher">
          <option value="">Thème clair</option>
          <option value="dark">Thème sombre</option>
        </select>

        <input type="submit" value="envoyer"/> 

      </form>
      <!-- Login form -->
      <form action="" id="login-form" method="post" autocomplete="off">
        <div id="form-title">
          Connexion
        </div>
        <div class="field">
          <label 
            class="field-label"
            for="field-username"
          >
            Identifiant
          </label>
          <input
            class="field-input"
            id="field-username"
            name="username"
            type="text"
            placeholder="Identifiant"
          />
          <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
        </div>
        <div class="field">
          <label 
            class="field-label"
            for="field-password"
          >
            Mot de passe
          </label>
          <input
            class="field-input"
            id="field-password"
            name="password"
            type="password"
            placeholder="Mot de passe"
          />
          <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
        </div>
        <div id="errors"></div>
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