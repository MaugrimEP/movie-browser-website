<?php
require_once('../data/require_once.php');

$db=new BD($pathToDBFromUserInterface);
$Ititre_original=new Text("Titre Original: ");
$Ititre_original->name='titre_O';

$Ititre_francais=new Text("Titre francais: ");
$Ititre_francais->name='titre_F';

//select $description,$descriptionpourChaque,$values
    $arrayDescriptionPays=Rows2Array($db->getPays(),'pays');
    $arrayPays=$arrayDescriptionPays;
    $arrayPays[]="";
    $arrayDescriptionPays[]="Non spécifié";

    $arrayPays=array_reverse($arrayPays);
    $arrayDescriptionPays=array_reverse($arrayDescriptionPays);

$Ipays=new Select("Origine",$arrayDescriptionPays,$arrayPays);
$Ipays->name='pays';

$IrealisateurN=new Text("Nom réalisateur: ");
$IrealisateurN->name='nomR';

$IrealisateurP=new Text("Prénom réalisateur: ");
$IrealisateurP->name='prenomR';

//range ($d,$mi,$ma,$s)
$Iduree=new Range("Durée minimale",0,$db->dureeMax(),1,'minutes');
$Iduree->name='duree';


//select $description,$descriptionpourChaque,$values
    $arrayDescriptionGenres=Rows2Array($db->getGenres(),'nom_genre');
    $arrayGenres=$arrayDescriptionGenres;
    $arrayGenres[]="NNDEF";
    $arrayDescriptionGenres[]="Non spécifié";

    $arrayGenres=array_reverse($arrayGenres);
    $arrayDescriptionGenres=array_reverse($arrayDescriptionGenres);
$Igenres=new Select ("Genre",$arrayDescriptionGenres,$arrayGenres);
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
  		<link rel="stylesheet" href="./css/advanced_research.css"/>
  <meta charset="utf-8">
  <title>Recherche avancé</title>
</head>
<body>
  <header><?php headerShow(); ?></header>
  <h1>Recherche Avancée</h1>
  <hr>
  <?php  advandedResearch($inputs) ?>
  <?php importJavascriptShow() ?>
</body>
</html>
