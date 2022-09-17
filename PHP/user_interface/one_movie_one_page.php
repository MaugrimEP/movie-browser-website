<?php
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
$acteurs=$db->getActeurbyFilms($_GET['idFilm']);
$genres=$db->getGenresbyFilms($_GET['idFilm']);
// variable $_GET[idFilm]
	function creationPageFilm($code_f)
	{
		$db=new BD('../class/base_stock/database');
			$film=$db->getInfoFilm($code_f);
			$film=BD::getAttributFromSimpleRow($film);
			echo "<h2> $film[titre_francais]</h2>\n";
			echo "<h3>($film[titre_original]) </h3>\n";
			echo '<img src="../data/Image/test.jpg" alt="'.$film['titre_original'].'"/><br>';
			echo "<table class='pure-table'>
					<tr>
						<td> Titre Original </td>
						<td> $film[titre_original]</td>
					</tr>
					<tr>
						<td> Titre Français </td>
						<td> $film[titre_francais] </td>
					</tr>
					<tr>
						<td> Origine </td>
						<td> $film[pays]</td>
					</tr>
					<tr>
						<td> Date de Sortie </td>
						<td> $film[date]</td>
					</tr>
					<tr>
						<td> Durée du film </td>
						<td> $film[duree] </td>
					</tr>
					<tr>
						<td> Type d'image </td>
						<td> $film[couleur]</td>
					</tr>
					<tr>
						<td>Réalisateur </td>
						<td><a href='display_films_by_realisateur.php?realisateur[]=$film[realisateur]'>  $film[nom] $film[prenom]</a></td>
					</tr>
				</table>";
	}
?>
<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="./css/header.css"/>
  <meta charset="utf-8">
  <title>Film</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
	<?creationPageFilm($_GET['idFilm']);
	displayActeurs($acteurs);
	displayGenres($genres);?>
  </article>
</body>
</html>
