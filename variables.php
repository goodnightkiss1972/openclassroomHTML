<?php
$age_du_visiteur = 17;
echo "Le visiteur a ";
echo $age_du_visiteur;
echo " ans";
?>
<br/>
<?php
echo "Le visiteur a $age_du_visiteur ans";
echo 'Le visiteur a $age_du_visiteur ans'; // Ne marche pas
echo 'Le visiteur a ' . $age_du_visiteur . ' ans';
?>
<?php
$age = 24;

if ($age >= 18)
{
	$majeur = true;
}
else
{
	$majeur = false;
}
?>
<?php
$age = 24;

$majeur = ($age >= 18) ? true : false;
?>
<br/>
<?php
$nombre_de_lignes = 1;

while ($nombre_de_lignes <= 10)
{
    echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
    $nombre_de_lignes++; // $nombre_de_lignes = $nombre_de_lignes + 1
}
?>