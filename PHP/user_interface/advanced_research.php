<?php
require_once('header.php');
require_once('../class/inputs/Text.class.php');
require_once('../class/inputs/CheckBox.class.php');
require_once('../class/inputs/Radio.class.php');
require_once('../class/inputs/Range.class.php');
require_once('../class/inputs/Select.class.php');
require_once('../class/inputs/Submit.class.php');
require_once('../functions/functions.php');
require_once('../class/BD.class.php');

$db=new BD('../class/base_stock/database');
$Ititre_original=new Text("titre Original: ");
$Ititre_original->name='titre_O';

$Ititre_francais=new Text("titre francais: ");
$Ititre_francais->name='titre_F';

//select $description,$descriptionpourChaque,$values
    $arrayDescriptionPays=paysRows2Array($db->getPays());
$Ipays=new Select("pays",$arrayDescriptionPays,$arrayDescriptionPays);
$Ipays->name='pays';

$IrealisateurN=new Text("nom realisateur: ");
$IrealisateurN->name='nomR';

$IrealisateurP=new Text("prenom realistaur: ");
$IrealisateurP->name='prenomR';

//range ($d,$mi,$ma,$s)
$Iduree=new Range("durée minimal",0,$db->dureeMax(),1,'minutes');
$Iduree->name='duree';

$Isubmit=new Submit('rechercher !','GO');
$Isubmit->name='submit';

$inputs=array(
  $Ititre_original,
  $Ititre_francais,
  $Ipays,
  $IrealisateurN,
  $IrealisateurP,
  $Iduree,
  $Isubmit
);


function advandedResearch($inputs)
{
  ?>
  <form method='post' action='display_advanced_research.php'>
  <?php displayInputs($inputs); ?>
  </form>
<?php

}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Recherche</title>
</head>
<body>
  <header><?php headerShow(); ?></header>
  <article>
  <h2>Recherche Avancée</h2>
  <?php  advandedResearch($inputs) ?>
  </article>
</body>
</html>
