<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        $mode = "visiteur";
    }
    else {
        $mode = "connecte";
    }
?>
<ul class="menu">
    <li><a href="acceuil.php" class="actif">Mes Bubbles</a></li>
    <?php
        if ($mode == "visiteur") {
            echo "<li><a href=\"acceuil.php\">Bienvenue chez Bubbles !</a></li>";
            echo "<li><a href=\"connexion_form.php\">S'inscrire / Se connecter</a></li>";
//            echo "<li><a href=\"connexion_form.php\"  onclick=\"open('connexion_form.php', 'Popup', 'scrollbars=1,resizable=1,height=560,width=770'); return false;\" >S'inscrire / Se connecter</a></li>";
        }
        else {
            echo "<li><a href=\"profil.php\">Bienvenue ";
            echo $_SESSION['login']; echo " - Consulter votre profil";
            echo "</a></li>";
            echo "<li><a href=\"deconnexion.php\">Se deconnecter</a></li>";
        }
    ?>
</ul>
