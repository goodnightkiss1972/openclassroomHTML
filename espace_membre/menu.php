<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    $mode = "visiteur";
} else {
    $mode = "connecte";
}
?>
<nav>
    <ul class="menu">
        <li><a href="accueil.php" class="actif">Mes Bubbles</a></li>
        <?php
        if ($mode == "visiteur") {
            echo "<li><a href=\"accueil_profil.php\">Bienvenue chez Bubbles !</a></li>";
            echo "<li><a href=\"connexion_form.php\">S'inscrire / Se connecter</a></li>";
        } else {
            echo "<li><a href=\"accueil_profil.php\">Bienvenue ".$_SESSION['login']."</a></li>";
            echo "<li><a href=\"accueil_amis.php\">Gerer les amis</a></li>";
            echo "<li><a href=\"accueil_deconnexion.php\">Se deconnecter</a></li>";
        }
        ?>
    </ul>
</nav>