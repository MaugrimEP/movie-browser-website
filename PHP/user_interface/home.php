<?php
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
$rows=$db->getTenFirstRows();

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.6.0/pure-min.css">
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
  <h2>Les 10 derniers films en date</h2>
  <?php displayHome($rows);?>
  </article>
</body>
</html>
