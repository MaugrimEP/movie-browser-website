<?php
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
$rows=$db->getTenFirstRows();

?>

<!doctype html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="./css/header.css"/>
  <meta charset="utf-8">
  <title>Accueil</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
  <h2>Les 10 derniers films en date</h2>
  <?php displayHome($rows);?>
  </article>
</body>
</html>
