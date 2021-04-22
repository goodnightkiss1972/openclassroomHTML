<?php
// inclusion des variables de connexion - a transformer avec PDO pour l'ensemble de la relation avec la BDD
include ("connect.php");
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    if (
        (isset($_POST['login']) && !empty($_POST['login'])) && // verifie que le login a ete renseigne
        (isset($_POST['pwd']) && !empty($_POST['pwd'])) && // verifie que le mot de passe a ete renseigne
        (filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) // verifie que le login est bien une adresse email
    ) { 

    // on se connecte a la BDD pour verifier si le login n'existe pas deja
    try {
        // On se connecte à MySQL
        $bdd = new PDO(DSN, LOGIN_BDD, PASS_BDD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
                    
    // recherche de l'utilisateur par login mail
    $requete_sql = 'SELECT login_mail, mot_de_passe FROM t_utilisateur WHERE login_mail="'.htmlspecialchars($_POST['login']).'"'; 
    $reponse = $bdd->query($requete_sql);
    $resultat_requete = $reponse->fetchAll();
    $resultat_compte = count($resultat_requete);

    // si on a obtenu une (et une seule reponse) alors on va accepter la connexion a l'espace membre avec verification du mot de passe, sinon on va rejeter
    if ($resultat_compte == 1) {
        session_start(); // initialisation des variables super-globales pour pouvoir les appeler et/ou les utiliser

        // verification du mot de passe
        $is_mot_de_passe_valide = password_verify($_POST['pwd'], $resultat_requete[0]['mot_de_passe']); // ici [0] sert a preciser qu'on remonte sur le premier (et seul) enregistrement
        if ($is_mot_de_passe_valide) {
            $_SESSION['login'] = $_POST['login']; // ici on admet le login saisi dans le formulaire precedent pour le loger dans la session
            // si on veut que le site se souvienne de notre login la prochaine fois, on a coche la case correspondante
//            if (isset($_POST['souvenir']) && $POST['souvenir'] == "oui") {
//                setcookie('dernier_login', $_POST['login'], time() = 1*3600, null, null, false, true);
//            }
            header('Location: acceuil.php');
            exit();
        }
        else {
            $erreur = 'Mot de passe non reconnu. Veuillez essayer à nouveau svp.';
            echo $erreur;
            echo "<br/><a href=\"acceuil.php\">Acceuil</a>";
            exit();
        }
    }
    // si on a pas obtenu de reponse
    elseif ($resultat_compte == 0) {
        $erreur = 'Login ou Mot de passe non reconnu. Veuillez essayer à nouveau svp.';
        echo $erreur;
        echo "<br/><a href=\"acceuil.php\">Acceuil</a>";
        exit();
    }
    // sinon c'est qu'on a obtenu plusieurs reponses mais normalement le modele de la BDD nous protege de cela
    else {
        $erreur = 'Plusieurs membres ont les memes login et mot de passe ! Anomalie dans les donnees.';
        echo $erreur;
        echo "<br/><a href=\"acceuil.php\">Acceuil</a>";
        exit();
    }
    }
    else {
        $erreur = 'Erreur de saisie - <br/>Au moins un des champs login ou mot de passe est vide ou invalide !';
        echo $erreur;
        echo "<br/><a href=\"acceuil.php\">Acceuil</a>";
        exit();
    }
}


?>