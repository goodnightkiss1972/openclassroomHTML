<?php
include("database.php");
?>

<div class="central publication">
    <h1>Page de gestion de vos amis
</div>

<?php
$requete = "SELECT id_utilisateur, login_mail, date_inscription, pseudonyme, pouvoir 
                        FROM t_utilisateur 
                        ORDER BY pseudonyme ASC";
$resultat = execute_requete($requete);
if (mysqli_num_rows($resultat) > 0) {
    echo "<div class=\"central\"><table class=\"bubble_table\">";
    echo "<tr><td>Login</td><td>Pseudonyme</td><td>Inscrit le</td><td>Pouvoir</td><td>Action</td>";
    $ligne = mysqli_fetch_assoc($resultat);
    while ($ligne) {
        echo "<tr>";
        echo "<td>" . $ligne['login_mail'] . "</td>";
        echo "<td>" . $ligne['pseudonyme'] . "</td>";
        echo "<td>" . $ligne['date_inscription'] . "</td>";
        echo "<td>" . $ligne['pouvoir'] . "</td>";
        echo "<td><form action=\"utilisateur_voir.php\" method=\"post\">";
        echo "<input type=\"submit\" name=\"pseudonyme\" value=\"Ajouter\">";
        echo "<input type=\"hidden\" name=\"pseudonyme_choisi\" value=" . $ligne['pseudonyme'] . ">";
        echo "</form></td>";
        echo "</tr>";
        $ligne = mysqli_fetch_assoc($resultat);
    }
    echo "</table></div>";
}
mysqli_free_result($resultat);
?>