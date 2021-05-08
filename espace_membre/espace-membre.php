<?php
// demarrage de la session (toujours avant toute balise HTML)
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
// si le login n'est pas present dans les variables super globales alors c'est que l'identification n'a pas ete etablie
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bienvenue dans votre Bubble !</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body>
<p><strong>ESPACE MEMBRE</strong><br/>
Bienvenue <?php echo htmlentities(trim($_SESSION['login']));?> !<br/>
<a href="deconnexion.php">Deconnexion</a>
</p>
</body>
</html>



