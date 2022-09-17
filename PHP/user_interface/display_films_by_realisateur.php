<?php
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
$infosRealisteur=$db->getInfoPpl(simpleArray2String($_GET['realisateur']));
$infosRealisteur=BD::getAttributFromSimpleRow($infosRealisteur);
$films=$db->getFilmsByRealisteur(simpleArray2String($_GET['realisateur']));

function linkToFilm($string,$f)
{
  echo "<a href='one_movie_one_page.php?idFilm=$f[code_film]'> $string </a>";
}

?>
<!doctype html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="./css/header.css"/>
  <link rel="stylesheet" href="./css/display_films_by_acteurs.css"/>
  <meta charset="utf-8">
  <title>resultat recherche</title>
</head>
<body>
  <header><?php headerShow();?></header>
    <h1>Films du réalisateur <?php echo $infosRealisteur['nom'];echo $infosRealisteur['prenom'];?></h1>
    <hr>
    <section>
      <?php foreach ($films as $f){      /* Ligne 31 remplacer lien par nom affiche film si BD*/
		   echo "<a href='one_movie_one_page.php?idFilm=".$f['code_film']."'>
				<div class = 'fiche_film' name = 'fiche_film'>
					<div class = 'sous_fiche_film' name = 'sous_fiche_film'>
						<img src = '../data/Image/lgdvg.jpg' alt = '' class = 'affiche' height = '400'/> 
						<h2 class = 'titre_film'>".$f['titre_francais']."</h2>
					</div>
				</div>
			</a>";
      }?>
      </section>
  <?php importJavascriptShow() ?>
</body>
</html>
