<?php
require_once('../data/require_once.php');

$db=new BD($pathToDBFromUserInterface);
$Ititre_original=new Text("titre Original: ");
$Ititre_original->name='titre_O';

$Ititre_francais=new Text("titre francais: ");
$Ititre_francais->name='titre_F';

//select $description,$descriptionpourChaque,$values
    $arrayDescriptionPays=Rows2Array($db->getPays(),'pays');
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


//select $description,$descriptionpourChaque,$values
    $arrayDescriptionGenres=Rows2Array($db->getGenres(),'nom_genre');
    $arrayGenres=$arrayDescriptionGenres;
    $arrayGenres[]="NNDEF";
    $arrayDescriptionGenres[]="Non spécifier";

    $arrayGenres=array_reverse($arrayGenres);
    $arrayDescriptionGenres=array_reverse($arrayDescriptionGenres);
$Igenres=new Select ("genre du film",$arrayDescriptionGenres,$arrayGenres);
$Igenres->name='genres';

$Isubmit=new Submit('rechercher !','GO');
$Isubmit->name='submit';

$inputs=array(
  $Ititre_original,
  $Ititre_francais,
  $Ipays,
  $IrealisateurN,
  $IrealisateurP,
  $Iduree,
  $Igenres,
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
  		<link rel="stylesheet" href="./css/header.css"/>
  <meta charset="utf-8">
  <title>Recherche</title>
</head>
<body>
  <header><?php headerShow(); ?></header>
  <article>
  <h2>Recherche Avancée</h2>
  <?php  advandedResearch($inputs) ?>
  </article>
  <?php importJavascriptShow() ?>
</body>
</html>
