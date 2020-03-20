<?php

// check if key exist
if(isset($_GET['theme-switcher'])){ 
    // store value in cookie
    setcookie("theme-switcher-cookie-key", $_GET['theme-switcher']);
}

// force header to redirect HTTP request to good page
header('Location: index.php');

?>