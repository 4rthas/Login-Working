<?php
// session start loaded  at the very first to provide arrray of session in whole application
session_start(); // $_SESSION

require_once('users.php');

// Login page receive datas from form login given by index page and check them

if( !empty($_POST) && isset($_POST['username']) && isset($_POST['password'])) {
//var_dump($_POST);
//var_dump($users);

    // clean strings
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // if user and password aren't empty then pass to be checked
    if(!empty($username) && !empty($password)){

        // check if key username exist in $users array
        if(array_key_exists($username, $users)){ // like isset but for arrays

            // password_verify(keyToBeCheckedClear, hashedKey) hash alorythme automatically detected
            if(password_verify($password, $users[$username]['pass'])){

                // if all is good then pass user in "connected"
                $_SESSION['connectedUser'] = $users[$username];

            }  else {
                echo 'utilisateur ou mot de passe incorrect';
            }
        }

    } else {
        echo 'utilisateur ou mot de passe incorrect';
    }

    // redirection to index.php
    header('Location: index.php');

}