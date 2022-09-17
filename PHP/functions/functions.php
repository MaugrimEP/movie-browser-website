<?php
require_once("../data/require_once.php");

function displayFast($res)
{
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
				<a href='add_update.php?idFilm=$r[code_film]&action=update'><div class = 'button_modify'></div></a>
				<form id = 'form_delete' method='GET' action='display_fast_research.php'>
					<input type='hidden' name='idFilm' value='$r[code_film]'/>
					<input type='hidden' name='deleting' value='true'/>
					<input type='hidden' name='keyResearch' value='$_GET[keyResearch]'/>
					<input class = 'button_delete' type='submit' value=''>
				</form>
			</div>
		</div>
		<hr>\n";
  }
}


function displayHome($res){
  echo "<section>";
  foreach($res as $r){
    echo "<a href='one_movie_one_page.php?idFilm=".$r['code_film']."'>
			<div class = 'fiche_film' name = 'fiche_film'>
				<div class = 'sous_fiche_film' name = 'sous_fiche_film'>
					<img src = '../data/Image/lgdvg.jpg' alt = '' class = 'affiche' height = '400'/>
					<div class = 'info'>
						<h2 class = 'titre_film'>".$r['titre_francais']."</h2>
						<div class = 'ligne'>
							<label>Réalisateur :</label><div class = 'valeur'>".$r['prenom']." ".$r['nom']."</div>
						</div>
					</div>
				</div>
			</div>
		</a>";
  }
  echo "</section>";
}

function Rows2Array($rows,$column)
{
  $res=array();
  foreach($rows as $r)
  {
    $res[] = $r[$column];
  }
  return $res;
}

function displayInputs($I)
{
  foreach($I as $e)
  {
    $e->affiche();
  }
}

function simpleArray2String($a)
{
  foreach($a as $s)
  {
    return $s;
  }
}

function displayActeurs($res)
{
  echo "<div id = 'bloc2'>";
  echo "<h3>Acteur(s) : </h3>\n";
  echo "<ul>";
  foreach($res as $a)
  {
    echo "<li>";
    echo "<a class = 'lien_individu' href='display_films_by_acteurs.php?acteurs[]=$a[code_indiv]'>$a[nom] $a[prenom]</a>";
    echo "</li>";
  }
  echo "</ul>";
  echo "</div>";
}


function ActeursRowType2Array($rows)
{
  $res=array();
  foreach($rows as $a)
  {
    $res[]=$a['nom']." ".$a['prenom'];
  }
  return $res;
}

function ActeursRowType2ArrayID($rows)
{
  $res=array();
  foreach($rows as $a)
  {
    $res[]=$a['ref_code_acteur'];
  }
  return $res;
}

function displayGenres($res)
{
  echo "<div id = 'bloc3'>";
  echo "<h3>Genre(s) :</h3>\n";
  echo "<ul>";
  foreach($res as $g)
  {
    echo "<li>";
    echo "$g[nom_genre] <br>";
    echo "</li>\n";
  }
  echo "</ul>";
  echo "</div>";
}

?>
