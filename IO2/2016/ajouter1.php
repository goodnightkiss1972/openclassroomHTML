<?php

if (isset($_POST['TabidArticles']) && !empty($_POST['TabidArticles'])) {
    echo "Produits ajoutés aux favoris<br/><br/>";

    foreach ($_POST['TabidArticles'] as $article) {
        echo $article."<br/>";
    }
}
else {
    echo "Aucun produit n'a été ajouté.";
}

?>