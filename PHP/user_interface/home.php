<?php
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
$rows=$db->getTenFirstRows();

?>

<!doctype html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="./css/header.css"/>
  <link rel="stylesheet" href="./css/home.css"/>
  <meta charset="utf-8">
  <title>Accueil</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
  <h1>Les 10 derniers films en date</h1>
  <hr>
  <?php displayHome($rows);?>
  </article>
  <?php importJavascriptShow() ?>
</body>
</html>
