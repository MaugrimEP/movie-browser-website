<?php
require_once('../data/require_once.php');

$co=new BD($pathToDBFromUserInterface);


//select $description,$descriptionpourChaque,$values
    $arrayDescriptionActeurs=ActeursRowType2Array($co->getActeurs());
    $arrayActeurs=ActeursRowType2ArrayID($co->getActeurs());

$Isubmit=new Submit('rechercher !','Chercher');
$Isubmit->name='submit';
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  		<link rel="stylesheet" href="./css/header.css"/>
  		<link rel="stylesheet" href="./css/acteurs_search.css"/>
  <title>Recherche Acteurs</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <h1>Rechercher les films d'un acteur</h1>
  <hr>
  <form method="get" action="display_films_by_acteurs.php">
	  <label> Acteur : </label>
	  <select name = "acteurs[]" id = "acteurs[]">
  <?php
      for ($i = 0; $i < count($arrayActeurs); $i++){
		  echo "<option value='".$arrayActeurs[$i]."'>".$arrayDescriptionActeurs[$i]." </option>\n";
	  }
  ?>
	  </select><br>
	  <input id = 'submitButton' type="submit" value="Chercher">
  </form>
  <?php importJavascriptShow() ?>
</body>
</html>
