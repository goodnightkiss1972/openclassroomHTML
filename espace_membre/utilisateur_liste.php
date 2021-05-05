<?php
    include ("connect_mysqli.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Acceuil</title>
        <meta name="robots" content="noindex, nofollow">
        <link rel="stylesheet" href="bubbles.css">
    </head>
    <body>
        <?php
            include ("menu.php");
            echo ("Page de gestion des utilisateurs");
            $requete = "SELECT id_utilisateur, login_mail, date_inscription, pseudonyme, pouvoir 
                        FROM t_utilisateur 
                        ORDER BY pseudonyme ASC";
            $resultat = mysqli_query($connexion, $requete);
            if(!$resultat) {
                echo mysqli_error($connexion);
                exit();
            }
            if (mysqli_num_rows($resultat) > 0) {
                echo "<table>";
                echo "<tr><td>Login</td><td>Pseudonyme</td><td>Inscrit le</td><td>Pouvoir</td><td>Action</td>";
                $ligne = mysqli_fetch_assoc($resultat);
                while ($ligne) {
                    echo "<tr>";
                    echo "<td>".$ligne['login_mail']."</td>";
                    echo "<td>".$ligne['pseudonyme']."</td>";
                    echo "<td>".$ligne['date_inscription']."</td>";
                    echo "<td>".$ligne['pouvoir']."</td>";
                    echo "<td><form action=\"utilisateur_voir.php\" method=\"post\">";
                    echo "<input type=\"submit\" name=\"pseudonyme\" value=\"Ajouter\">";
                    echo "<input type=\"hidden\" name=\"pseudonyme_choisi\" value=".$ligne['pseudonyme'].">";
                    echo "</form></td>";
                    echo "</tr>";
                    $ligne = mysqli_fetch_assoc($resultat);
                }
                echo "</table>";
            }
        ?>
    </body>
</html>
