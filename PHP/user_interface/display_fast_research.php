<?php
require_once('../data/require_once.php');
$co=new BD($pathToDBFromUserInterface);
if (isset($_GET['deleting']))
{
  $co->deleteFilmStatm($_GET['idFilm']);
}
?>

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="./css/header.css"/>
  <meta charset="utf-8">
  <title>Recherche Rapide</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <h1>Résultat de la recherche</h1>
  <?php
      $res=$co->getFastSearch($_GET['keyResearch']);
      displayFast($res);
  ?>
  <?php importJavascriptShow() ?>
</body>
</html>
