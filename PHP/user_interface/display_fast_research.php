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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.6.0/pure-min.css">
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
