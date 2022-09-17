<?php
require_once('../data/require_once.php');

$db=new BD($pathToDBFromUserInterface);
$Ititre_original=new Text("titre Original: ");
$Ititre_original->name='titre_O';

$Ititre_francais=new Text("titre francais: ");
$Ititre_francais->name='titre_F';

//select $description,$descriptionpourChaque,$values
    $arrayDescriptionPays=paysRows2Array($db->getPays());
    $arrayPays=$arrayDescriptionPays;
    $arrayPays[]="";
    $arrayDescriptionPays[]="Non spécifier";

    $arrayPays=array_reverse($arrayPays);
    $arrayDescriptionPays=array_reverse($arrayDescriptionPays);

$Ipays=new Select("pays",$arrayDescriptionPays,$arrayPays);
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
  <form method='get' action='display_advanced_research.php'>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.6.0/pure-min.css">
</head>
<body>
  <header><?php headerShow(); ?></header>
  <article>
  <h2>Recherche Avancée</h2>
  <?php  advandedResearch($inputs) ?>
  </article>
</body>
</html>
