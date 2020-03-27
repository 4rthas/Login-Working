<?php

    // demo on hash working

    /*
    $pw = "clearPassword";
    echo md5($pw . "asdkfjadlkjweqoirewqoruo230r3u0");
    for($i = 0; $i < 5000; $i++){
        $pw = md5($pw);
    }
    echo '<br>';
    echo $pw;
    */

    // clear password
    $pw = "toto";

    // hash generated from password
    // cost to slow hash
    $hash = password_hash($pw, PASSWORD_DEFAULT, ["cost" => 11]);

    echo $hash;

    // return boolean if the clear password match with the hashed one in database
    var_dump(password_verify($pw, $hash));

?>