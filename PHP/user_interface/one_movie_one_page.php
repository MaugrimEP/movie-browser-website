<?php
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
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
			echo "<table class='pure-table'>>
					<thread><tr>
						<td> Titre Original </td>
						<td> $film[titre_original]</td>
					</tr></thread>
					<thread><tr>
						<td> Titre Français </td>
						<td> $film[titre_francais] </td>
					</tr></thread>
					<thread><tr>
						<td> Origine </td>
						<td> $film[pays]</td>
					</tr></thread>
					<thread><tr>
						<td> Date de Sortie </td>
						<td> $film[date]</td>
					</tr></thread>
					<thread><tr>
						<td> Durée du film </td>
						<td> $film[duree] </td>
					</tr></thread>
					<thread><tr>
						<td> Type d'image </td>
						<td> $film[couleur]</td>
					</tr></thread>
					<thread><tr>
						<td> Réalisateur </td>
						<td> $film[nom] $film[prenom]</td>
					</tr></thread>
					<thread><tr>
						<td> Genre </td>
						<td> $film[nom_genre]</td>
					</tr></thread>
				</table>";
	}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Film</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.6.0/pure-min.css">
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
	<?creationPageFilm($_GET['idFilm']);
	displayActeurs($acteurs);?>
  </article>
</body>
</html>
