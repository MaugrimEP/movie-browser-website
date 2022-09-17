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
  <meta charset="utf-8">
  <title>Recherche Rapide</title>
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
