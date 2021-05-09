<?php

$connexion = mysqli_connect("127.0.0.1", "root", "", "bubbles");

if (!$connexion) {
    echo mysqli_connect_error($connexion);
}

mysqli_set_charset($connexion, "utf8");

?>