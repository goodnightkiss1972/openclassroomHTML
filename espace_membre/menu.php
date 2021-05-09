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
        <li><a href="acceuil.php" class="actif">Mes Bubbles</a></li>
        <?php
        if ($mode == "visiteur") {
            echo "<li><a href=\"menu_profil.php\">Bienvenue chez Bubbles !</a></li>";
            echo "<li><a href=\"connexion_form.php\">S'inscrire / Se connecter</a></li>";
        } else {
            echo "<li><a href=\"menu_profil.php\">Bienvenue ";
            echo $_SESSION['login'];
            echo " - Consulter votre profil";
            echo "</a></li>";
            echo "<li><a href=\"utilisateur_liste.php\">Gerer utilisateurs</a></li>";
            echo "<li><a href=\"deconnexion.php\">Se deconnecter</a></li>";
        }
        ?>
    </ul>
</nav>