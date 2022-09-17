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
$Ititre_francais=new Text("titre francais: ");
//select $description,$descriptionpourChaque,$values
    $arrayDescriptionPays=paysRows2Array($db->getPays());
$Ipays=new Select("pays",$arrayDescriptionPays,$arrayDescriptionPays);
$Irealisateur=new Text("realisateur: ");
//range ($d,$mi,$ma,$s)
$Iduree=new Range("durée minimal",0,$db->dureeMax(),1,'minutes');
$Isubmit=new Submit('rechercher !','GO');

$inputs=array(
  $Ititre_original,
  $Ititre_francais,
  $Ipays,
  $Irealisateur,
  $Iduree,
  $Isubmit,
);


function advandedResearch($inputs)
{
  ?>
  <form method='post' action='display_research.php'>
  <input type='hidden' name='typeRecherche' value='advanced'/>
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
