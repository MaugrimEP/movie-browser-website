<?php 
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);

$numR = '10';

$idFilm = $db->createMovie($_GET['titre_original'], $_GET['titre_francais'], $_GET['origine'], $_GET['annee'], $_GET['duree'], "couleur", $numR, "lgdvg.jpg", $_GET['genre']);
header( "refresh:3; url=one_movie_one_page.php?idFilm=$idFilm");

?>

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="./css/header.css"/>
	<link rel="stylesheet" href="./css/one_movie_one_page.css"/>
  <meta charset="utf-8">
  <title>Film</title>
</head>
<body>
  <header><?php headerShow();?></header>
	<p>Le film a été ajouté avec succès. Veuillez patienter quelques secondes, vous allez être redirigé</p>
	<p> <?php echo $db->generateCode('films','code_film') ?></p>
  <?php importJavascriptShow() ?>
</body>
</html>
