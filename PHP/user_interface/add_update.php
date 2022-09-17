<!--
variable par méthode GET : [idFilm=l'id du film] et action = <add|update> require_once('header.php')
-->

<?php require_once header.php ?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Ajout d'un film</title>
	</head>
	<body>
		<header>
			<?php headerShow() ?>
		</header>
		<?php if $_GET['action']=="add"{
			echo "<h1>Ajouter un film</h1>";
		}
		else{
			echo "<h1>Editer un film</h1>";
		} ?>
	</body>
</html>

