<?php
require_once('../data/require_once.php');

$co=new BD($pathToDBFromUserInterface);


//select $description,$descriptionpourChaque,$values
    $arrayDescriptionActeurs=ActeursRowType2Array($co->getActeurs());
    $arrayActeurs=ActeursRowType2ArrayID($co->getActeurs());

$Iacteurs=new Select("acteurs",$arrayDescriptionActeurs,$arrayActeurs);
$Iacteurs->name='acteurs';

$Isubmit=new Submit('rechercher !','GO');
$Isubmit->name='submit';

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  		<link rel="stylesheet" href="./css/header.css"/>
  <title>Recherche Acteurs</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
  <h2>Rechecher les films qu'on fait un acteurs</h2>
  <form method="get" action="display_films_by_acteurs.php">
  <?php
      $Iacteurs->affiche();
      $Isubmit->affiche();
  ?>
</from>
  </article>
</body>
</html>
