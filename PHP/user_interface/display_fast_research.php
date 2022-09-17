<?php
require_once('../class/BD.class.php');
require_once('../functions/functions.php');
require_once('header.php');

$co=new BD('../class/base_stock/database');
if (isset($_GET['deleting']))
{
  $co->deleteFilmStatm($_GET['idFilm']);
}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Recherche</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
  <h2>Resultat de la recherche</h2>
  <?php
      $res=$co->getFastSearch($_GET['keyResearch']);
      displayFast($res);
  ?>
  </article>
</body>
</html>
