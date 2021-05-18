<?php

define ('DATABASE_SERVER', "127.0.0.1");
define ('DATABASE_LOGIN', "root");
define ('DATABASE_PASSWORD', "");
define ('DATABASE', "bubbles");

function execute_requete($req) {
    $connexion = mysqli_connect(DATABASE_SERVER, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE);
    if (!$connexion) {
        echo mysqli_connect_error($connexion);
        exit();
    }
    mysqli_set_charset($connexion, "utf8");
    
    $res = mysqli_query($connexion, $req);
    if (!$res) {
        echo mysqli_error($connexion);
        exit();
    }
    return $res;
}

?>