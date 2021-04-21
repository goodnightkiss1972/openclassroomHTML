<?php
include ("connect.php");
// on verifie que le visiteur a envoye un formulaire puis que ce formulaire est correct
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    if (
        (isset($_POST['login']) && !empty($_POST['login'])) &&
        (isset($_POST['mdp1']) && !empty($_POST['mdp1'])) &&
        (isset($_POST['mdp2']) && !empty($_POST['mdp2']))
    ) {
        if ($_POST['mdp1'] != $_POST['mdp2']) {
            $erreur = 'Les deux mots de passe ne sont pas identiques';
            echo $erreur;
            echo "<br/><a href=\"acceuil.php\">Acceuil</a>";
            exit();
        }
        else {
            // on se connecte a la BDD pour verifier si le login n'existe pas deja
            try
            {
                // On se connecte à MySQL
                $bdd = new PDO(DSN, LOGIN_BDD, PASS_BDD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(Exception $e)
            {
                // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
            }
                    
            // recherche de l'utilisateur par login mail
            $requete_sql = 'SELECT COUNT(*) FROM t_utilisateur WHERE login_mail="'.htmlspecialchars($_POST['login']).'"';
            $reponse = $bdd->query($requete_sql);
            $resultat_requete = $reponse->fetch();

            // si aucun login n'a ete trouve on va admettre la creation de ce membre
            if ($resultat_requete[0] == 0) {
                $datecourante = date('Y-m-d H:i:s');
                $requete_sql = 'INSERT INTO t_utilisateur (login_mail, mot_de_passe, date_inscription, pseudonyme, code_verification, valide) VALUES (
                    "'.htmlspecialchars($_POST['login']).'",
                    "'.htmlspecialchars(password_hash($_POST['mdp1'], PASSWORD_DEFAULT)).'",
                    "'.$datecourante.'",
                    "'.htmlspecialchars($_POST['login']).'",
                    "'.htmlspecialchars($_POST['login']).'",
                    "1"
                    )';
                    $bdd->query($requete_sql);
                    echo 'Inscription reussie, bienvenue chez Bubbles !';
                    echo "<br/><a href=\"acceuil.php\">Acceuil</a>";
                    exit();
                }
            else {
                $erreur = 'Echec de l\'inscription, veuillez essayer a nouveau s\'il vous plait.';
                echo $erreur;
                echo "<br/><a href=\"acceuil.php\">Acceuil</a>";
            }
        }
    }





}
?>