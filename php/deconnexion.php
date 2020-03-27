<?php
    session_start();

    // user disconnected
    unset($_SESSION['connectedUser']);

    // redirect to index.php
    header("Location: index.php");
?>