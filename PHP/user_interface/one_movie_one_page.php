<?php
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
$acteurs=$db->getActeurbyFilms($_GET['idFilm']);
$genres=$db->getGenresbyFilms($_GET['idFilm']);
$film=$db->getInfoFilm($_GET['idFilm']);
$film=BD::getAttributFromSimpleRow($film);
	function creationPageFilm($film)
	{
			echo "<h2> $film[titre_francais]</h2>";
			echo "<hr>";
			echo "<section>";
			echo '<img src="../data/Image/lgdvg.jpg" alt="'.$film['titre_original'].'" width = "600"/>';
			echo "<div id = 'info'>
					<div id = 'bloc1'>
						<div class = 'ligne'>
							<label>Titre Original : </label> $film[titre_original]
						</div>

						<div class = 'ligne'>
							<label>Titre Français : </label> $film[titre_francais]
						</div>

						<div class = 'ligne'>
							<label>Origine : </label> $film[pays]
						</div>

						<div class = 'ligne'>
							<label>Date de Sortie : </label> $film[date]
						</div>

						<div class = 'ligne'>
							<label>Durée du film : </label> $film[duree]
						</div>

						<div class = 'ligne'>
							<label>Type d'image : </label> $film[couleur]
						</div>

						<div class = 'ligne'>
							<label>Réalisateur : </label>
							<a class = 'lien_individu' href='display_films_by_realisateur.php?realisateur[]=$film[realisateur]'>  $film[nom] $film[prenom]</a>
						</div>
					</div>";
	}
?>
<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="./css/header.css"/>
	<link rel="stylesheet" href="./css/one_movie_one_page.css"/>
  <meta charset="utf-8">
  <title><?php echo $film['titre_original'];?></title>
</head>
<body>
  <header><?php headerShow();?></header>
	<?creationPageFilm($film);
	displayActeurs($acteurs);
	displayGenres($genres);?>
	</div>
	</section>
  <?php importJavascriptShow() ?>
</body>
</html>
