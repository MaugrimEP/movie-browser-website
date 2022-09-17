<?php
//variable par méthode POST : [idFilm=l'id du film]
require_once('header.php');
require_once('../functions/functions.php');
require_once('../class/BD.class.php');
$db=new BD('../class/base_stock/database');
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Recherche</title>
</head>
<body>
  <header></header>
  <article>
  <h2></h2>
  <?php
  $titre_original=simpleArray2String($_POST['titre_O']);
  $titre_francais=simpleArray2String($_POST['titre_F']);
  $pays=simpleArray2String($_POST['pays']);
  $nomR=simpleArray2String($_POST['nomR']);
  $prenomR=simpleArray2String($_POST['prenomR']);
  $duree=simpleArray2String($_POST['duree']);
  echo "$titre_original,$titre_francais,$pays,$nomR,$prenomR,$duree";
  displayFast($db->advancedSearch($titre_original,$titre_francais,$pays,$nomR,$prenomR,$duree));
  ?>
  </article>
</body>
</html>
