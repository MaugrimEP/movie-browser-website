<?php
//variable par méthode POST : [idFilm=l'id du film]
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
if (isset($_GET['deleting']))
{
  $db->deleteFilmStatm($_GET['idFilm']);
}
?>
<!doctype html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="./css/header.css"/>
  <link rel="stylesheet" href="./css/display_fast_research.css"/>
  <meta charset="utf-8">
  <title>Recherche Avancée</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <h1>Résultat recherche avancée</h1>
  <hr>
  <?php
  $titre_original=simpleArray2String($_GET['titre_O']);
  $titre_francais=simpleArray2String($_GET['titre_F']);
  $pays=simpleArray2String($_GET['pays']);
  $genres=simpleArray2String($_GET['genres']);
  $nomR=simpleArray2String($_GET['nomR']);
  $prenomR=simpleArray2String($_GET['prenomR']);
  $duree=simpleArray2String($_GET['duree']);


  $res=$db->advancedSearch($titre_original,$titre_francais,$pays,$nomR,$prenomR,$duree,$genres);
  echo "<div class = 'ligne'><div id = 'titre_o' class = 'titre_o'>Titre original</div> <div id = 'titre_f' class = 'titre_f'>Titre francais</div> <div id = 'date' class = 'date'>Date</div> <div id = 'duree' class = 'duree'>Durée</div> <div id = 'realisateur' class = 'realisateur'> Réalisateur </div> <div id = 'pays' class = 'pays'>Pays</div></div>\n";
  echo "<hr>\n";
  foreach($res as $r)
  {
    echo "<div class = 'ligne ligne_lien'>
			<a href='one_movie_one_page.php?idFilm=$r[code_film]' class = 'lien_vers_film'>
				<div class = 'infos'>
					<div class = 'titre_o'> $r[titre_original] </div>
					<div class = 'titre_f'> $r[titre_francais] </div>
					<div class = 'date'> $r[date] </div>
					<div class = 'duree'> $r[duree] </div>
					<div class = 'realisateur'> $r[prenom] $r[nom]</div>
					<div class = 'pays'> $r[pays]</div>
				</div>
			</a>
			<div class = 'modif_delete'>
				<a href='add_update.php?idFilm=$r[code_film]&action=update&titreo=$r[titre_original]&titref=$r[titre_francais]&pays=$r[pays]&nomR=$r[nom]&prenomR=$r[prenom]&duree=$r[duree]&date=$r[date]'><div class = 'button_modify'></div></a>
				<form id = 'form_delete' method='GET' action='display_advanced_research.php'>
					<input type='hidden' name='idFilm' value='$r[code_film]'/>
					<input type='hidden' name='deleting' value='true'/>
					<input type='hidden' name='titre_O[]' value='$titre_original'/>
					<input type='hidden' name='titre_F[]' value='$titre_francais'/>
					<input type='hidden' name='pays[]' value='$pays'/>
					<input type='hidden' name='nomR[]' value='$nomR'/>
					<input type='hidden' name='prenomR[]' value='$prenomR'/>
					<input type='hidden' name='duree[]' value='$duree'/>
					<input type='hidden' name='genres[]' value='$genres'/>
					<input class = 'button_delete' type='submit' value=''>
				</form>
			</div>
		</div>
		<hr>\n";
  }
  ?>
  <?php importJavascriptShow() ?>
</body>
</html>
