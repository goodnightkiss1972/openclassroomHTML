<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        $mode = "visiteur";
    }
    else {
        $mode = "connecte";
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Acceuil</title>
        <meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="bubbles.css">
    </head>
    <body>
        <ul class="menu">
            <li><a href="acceuil.php" class="actif">Mes Bubbles</a></li>
            <?php
                if ($mode == "visiteur") {
                    echo "<li><a href=\"acceuil.php\">Bienvenue chez Bubbles !</a></li>";
                }
                else {
                    echo "<li><a href=\"profil.php\">Bienvenue ";
                    echo $_SESSION['login']; echo " - Consulter votre profil";
                    echo "</a></li>";
                }
            ?>
            <li><a href="deconnexion.php">Se deconnecter</a></li>            
        </ul>
        Connexion à l'espace membre :<br/>
        <form action="connexion.php" method="post">
            Login&nbsp&nbsp<input type="text" name="login" value=""><br/>
            Mot de Passe&nbsp&nbsp<input type="password" name="pwd" value=""><br/>
            <input type="submit" name="connexion" value="Connexion">
        </form>
    </body>
    <a href="inscription.php">S'inscrire</a>
</html>

