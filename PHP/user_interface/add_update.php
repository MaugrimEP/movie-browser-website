<!--
variable par méthode GET : [idFilm=l'id du film] et action = <add|update> require_once('header.php')
-->

<?php require_once("../data/require_once.php");
$co = new BD($pathToDBFromUserInterface); ?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./css/add_update.css"/>
		<link rel="stylesheet" href="./css/header.css"/>
		<script type="text/javascript" src="./javascript/header.js"></script>
		<title>Ajout d'un film</title>
	</head>
	<body>
	<header>
			<?php headerShow() ?>
		</header>
		<?php if ($_GET['action']=="add"){
			echo "<h1>Ajouter un film</h1>";
			$nbAct = 1;
		}
		else{
			echo "<h1>Modifier un film</h1>";
			$nbAct = 1;     /* A modifier en taille de la liste des acteurs */
		} ?>
		<hr>
		<form action='redirection_vers_film.php'>
			<fieldset>
				<div class="case"><label for = "titre_original">Titre Original</label><input required type="text" id = "titre_original" name="titre_original" title="Veuillez saisir le titre original du film ici" value = "<?php if ($_GET['action']=="update"){echo $_GET['titreo'];}?>"></div></br>
				<div class ="case"><label for = "titre_francais">Titre Français</label><input required type="text" id = "titre_francais" name="titre_francais" title="Veuillez saisir le titre français du film ici" value = "<?php if ($_GET['action']=="update"){echo $_GET['titref'];}?>"></div></br>
				<div class ="case"><label for = "origine">Origine</label><input required type="text" id = "origine" name="origine" title="Veuillez saisir le pays d'origine du film ici" value = "<?php if ($_GET['action']=="update"){echo $_GET['pays'];}?>"></div></br>
				<div class="case"><label for = "annee">Année de sortie</label>
				<select id = "annee" name="annee">
					<?php
						$selected = "";
						for ($i = 1895; $i<date('Y')+5; $i++){
							if ($_GET['action']=="add"){
								if ($i == date('Y')){
									$selected = 'selected = "selected"';
								}
							}
							else{
								if ($i == $_GET["date"]){
									$selected = 'selected = "selected"';
								}
							}
							echo '<option value ="'.$i.'" '.$selected.'>'.$i.'</option>\n';
							$selected = "";
						}
					?>
				</select></div></br>
<!--
				<div class="case"><label for = "duree">Durée (minutes)</label><input required type="text" id = "duree" name="duree" title="Veuillez saisir la durée du film ici (en minutes)" value = "<?php if ($_GET['action']=="update"){echo $_GET['duree'];}?>"></div></br>
-->
				<div class="case"><label for = "duree">Durée (minutes)</label><input required type="range" name="duree" value="<?php if ($_GET['action']=="update"){echo $_GET['duree'];} else{echo "0";}?>" max="550" min="1" step="1" onchange="rangevalue.value=value"><output id="rangevalue"><?php if ($_GET['action']=="update"){echo $_GET['duree'];} else{echo "0";}?></output></div></br>
				<div class="case"><label for = "prenom_realisateur">Prénom réalisteur</label><input required type="text" id = "prenom_realisateur" name="prenom_realisateur" title="Veuillez saisir le prénom du réalisateur du film ici"value = "<?php if ($_GET['action']=="update"){echo $_GET['prenomR'];}?>">
				<label for = "nom_realisateur">Nom réalisteur</label><input required type="text" id = "nom_realisateur" name="nom_realisateur" title="Veuillez saisir le nom du réalisateur du film ici" value = "<?php if ($_GET['action']=="update"){echo $_GET['nomR'];}?>"></div></br>
				<div class="case"><label for = "genre">Genre</label>
				<select id = "genre" name="genre">
					<?php
						$arrayDescriptionGenres=Rows2Array($co->getGenres(),'nom_genre');
						$arrayIdGenres=Rows2Array($co->getGenres(),'code_genre');
						
						for ($i = 0; $i<count($arrayDescriptionGenres); $i++){
							echo '<option value ="'.$arrayIdGenres[$i].'">'.$arrayDescriptionGenres[$i].'</option>\n';
						}
					?>
				</select></div></br>
				<hr>
				<section id = "acteurBox">
					<div id = "list_acteurs">
						<div  class="case">
							<label for = "prenom_acteur1">Prénom acteur</label><input id="prenom_acteur1" type="text" name="acteurs[]"/>
							<label for = "nom_acteur1">Nom acteur</label><input id="nom_acteur1" type="text" name="acteurs[]"/>
						</div><br>
					</div>
					<button id = "add_actor" type="button" onclick="ajouterChamp()" >ajouter un acteur</button><br>
				</section>
				<hr>
				<input type='submit' id = "submitButton" value='Valider'>
			</fieldset>
		</form>
		<script type="text/javascript">
			var div = document.getElementById('list_acteurs');
			var nb_acteurs = <?php echo $nbAct ?>;

			function incrementNbActeurs(){
				nb_acteurs++;
			}

			function ajouterLigneActeur(nom){
				incrementNbActeurs();

				var sous_div = document.createElement("div");
				var case_prenom = document.createElement("input");
				var case_nom = document.createElement("input");
				var label_prenom = document.createElement("label");
				var label_nom = document.createElement("label");

				sous_div.setAttribute("class", "case");

				case_prenom.name = nom;
				case_prenom.type = "text";
				case_prenom.id = "prenom_acteur"+nb_acteurs;

				case_nom.name = nom;
				case_nom.type = "text";
				case_nom.id = "nom_acteur"+nb_acteurs;

				label_prenom.setAttribute("for","prenom_acteur"+nb_acteurs);
				label_prenom.innerHTML = "Prénom acteur";

				label_nom.setAttribute("for","prenom_acteur"+nb_acteurs);
				label_nom.innerHTML = "Nom acteur";

				sous_div.appendChild(label_prenom);
				sous_div.appendChild(case_prenom);
				sous_div.appendChild(label_nom);
				sous_div.appendChild(case_nom);

				div.appendChild(sous_div);
			}

			function ajouterChamp(){
				ajouterLigneActeur("acteurs[]");
				div.appendChild(document.createElement("br"));
			}
		</script>
		<?php importJavascriptShow() ?>
	</body>
</html>
