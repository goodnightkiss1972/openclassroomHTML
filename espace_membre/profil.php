<?php
    include("connect.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (!isset($_SESSION['login'])) {
        $mode = "visiteur";
        header ('Location: connexion_form.php');
        exit();
    }
    else {
        $mode = "connecte";
    }
    // a partir de là on est certain d'etre connecte on va donc appeler les données de l'utilisateur
    // attention il faudra quand même vérifier que le login est pertinent
    try {
        // On se connecte à MySQL
        $bdd = new PDO(DSN, LOGIN_BDD, PASS_BDD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
                        
    // recherche de l'utilisateur par login mail
    $requete_sql = 'CALL ps_voir_profil_utilisateur ("'.htmlspecialchars($_SESSION['login']).'")'; 
    $reponse = $bdd->query($requete_sql);
    $resultat_requete = $reponse->fetch();

    if ($resultat_requete['login_mail'] != $_SESSION['login']) {
        echo ("<br/>Erreur : le login n'a pas pu être trouvé");
        echo ("<br/>Veuillez revenir à l'<a href=\"acceuil.php\"acceuil du site</a> s'il vous plait>");
        exit();
    }
    else {
        echo "Voici votre profil";
        echo "<br/>";
        echo "<br/>";
        echo $resultat_requete['login_mail'];
        echo "<br/>";
        echo "Vous êtes inscrit depuis le ".$resultat_requete['date_inscription'];
        echo "<br/>";
        echo "Et votre pouvoir est ".$resultat_requete['pouvoir'];
        echo "<br/>";
    }
?>

