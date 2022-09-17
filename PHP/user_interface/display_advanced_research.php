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
  <?php displayFast($db->advancedSearch($_POST['Ititre_original']->name,$_POST['Ititre_francais']->name,$_POST['Ipays']->name,$_POST['IrealisateurN']->name,$_POST['IrealisateurP']->name,$_POST['Iduree']->name)) ?>
  </article>
</body>
</html>
