<?php
require_once('../class/BD.class.php');
require_once('../functions/functions.php');
require_once('header.php');
$db=new BD('../class/base_stock/database');
$rows=$db->getTenFirstRows();

?>

<!doctype html>
<html lang="fr">
<head>
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
