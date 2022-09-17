<!--
variable par méthode GET : [idFilm=l'id du film] et action = <add|update> require_once('header.php')
-->

<?php require_once("header.php"); ?>

<?php function ajouterChampActeur(){
		echo "<label>Prénom acteur</label><input required type='text' id = 'prenom_acteur' name='prenom_acteur' title='Veuillez saisir le prénom de l'acteur'>";
		echo "<label>Nom acteur</label><input required type='text' id = 'nom_acteur' name='nom_acteur' title='Veuillez saisir le nom de l'acteur'>";
}
?>




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
		<?php if ($_GET['action']=="add"){
			echo "<h1>Ajouter un film</h1>";
		}
		else{
			echo "<h1>Modifier un film</h1>";
		} ?>
	</body>
	<form action='display_fast_research.php'>
		
		<fieldset>
		<label for = "titre_original">Titre Original</label><input required type="text" id = "titre_original" name="titre_original" title="Veuillez saisir le titre original du film ici"></br>
		<label for = "titre_francais">Titre Français</label><input required type="text" id = "titre_francais" name="titre_francais" title="Veuillez saisir le titre français du film ici"></br>
		<label for = "annee">Année de sortie</label><input required type="text" id = "annee" name="annee" title="Veuillez saisir l'année de sortie du film ici"></br>
		<label for = "duree">Durée (minutes)</label><input required type="text" id = "duree" name="duree" title="Veuillez saisir la durée du film ici (en minutes)"></br>
		<label for = "prenom_realisateur">Prénom réalisteur</label><input required type="text" id = "prenom_realisateur" name="prenom_realisateur" title="Veuillez saisir le prénom du réalisateur du film ici">
		<label for = "nom_realisateur">Nom réalisteur</label><input required type="text" id = "nom_realisateur" name="nom_realisateur" title="Veuillez saisir le nom du réalisateur du film ici"></br>
		<div id = "list_acteurs">
			<input id="acteur" type="text" name="acteurs[]"/><br>
		</div>
		<button type="button" onclick="ajouterChamp()" >ajouter un acteur</button><br>
		</fieldset>
		
		<script type="text/javascript" >
	
		var div = document.getElementById('list_acteurs');
        
		function ajouterInput(nom){
			var input = document.createElement("input");
			input.nom = nom;
			div.appendChild(input);
		}
        
		function ajouterChamp(){
			ajouterInput("acteurs[]");
			div.appendChild(document.createElement("br"));
		}
        
		</script>
		
	</form>
</html>

