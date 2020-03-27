<?php 

    // file used to change theme and save it in cookie through url and $_GET

    // check if set is in URL
    if(!empty($_GET['theme'])){
        $theme = $_GET['theme'];

        // set an expiration time;
        $expiration = strtotime("+1 years");

        // setcookie("nameOfCookie", valueOfCookie, expirationUnixTimeookie, / for cookie available on all pages)
        setcookie("user_theme", $theme, $expiration, "/");
    }
    // redirect to index.php
    header("Location: index.php");

?>