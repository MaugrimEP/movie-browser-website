<?php
require_once('../class/BD.class.php');
require_once('../functions/functions.php');
require_once('header.php');
$db=new BD('../class/base_stock/database');
$acteurs=$db->getActeurbyFilms($_GET['idFilm']);
// variable $_GET[idFilm]
	function creationPageFilm($code_f)
	{
		$db=new BD('../class/base_stock/database');
			$film=$db->getInfoFilm($code_f);
			$film=BD::getAttributFromSimpleRow($film);
			echo "<h2> $film[titre_francais]</h2>\n";
			echo "<h3>($film[titre_original]) </h3>\n";
			echo '<img src="../data/Image/test.jpg" alt="'.$film['titre_original'].'"/><br>';
			echo "<table>
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
						<td> Réalisateur </td>
						<td> $film[nom] $film[prenom]</td>
					</tr>
				</table>";
	}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Film</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
	<?creationPageFilm($_GET['idFilm']);
	displayActeurs($acteurs);?>
  </article>
</body>
</html>
