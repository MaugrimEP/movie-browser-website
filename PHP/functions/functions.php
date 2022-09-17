<?
require_once('../data/require_once.php');


function displayFast($res)
{
  echo "<table >\n";
  echo "<tr><th> Titre original </th> <th> Titre francais </th> <th> Date </th> <th> Durée </th> <th>nom Réalisateur </td><th> prénom Realisateur </th> <th> Pays </th></tr>\n";
  foreach($res as $r)
  {
    echo "<tr>\n";
    echo "<td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_original] </a></td>
    <td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_francais] </a></td>
    <td> $r[date] </td> <td> $r[duree] </td> <td> $r[nom]</td><td> $r[prenom]</td> <td> $r[pays]</td>
    <td><a href='add_update.php?idFilm=$r[code_film]&action=update'> Modifier</a> </td>
    <form method='GET' action='display_fast_research.php'>
    <td><input type='hidden' name='idFilm' value='$r[code_film]'/>
    <input type='hidden' name='deleting' value='true'/>
    <input type='hidden' name='keyResearch' value='$_GET[keyResearch]'/>
    <input type='submit' value='Supprimer'> </td>
    </form>\n";
    echo "</tr>\n";
  }
  echo "</table>\n";
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
  echo "<h3>Liste des Acteurs :</h3>\n";
  echo "<ul>";
  foreach($res as $a)
  {
    echo "<li>";
    echo "<a href='display_films_by_acteurs.php?acteurs[]=$a[code_indiv]'>$a[nom] $a[prenom]</a><br>";
    echo "</li>\n";
  }
  echo "</ul>";
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
  echo "<h3>Liste des Genres :</h3>\n";
  echo "<ul>";
  foreach($res as $g)
  {
    echo "<li>";
    echo "$g[nom_genre] <br>";
    echo "</li>\n";
  }
  echo "</ul>";
}

?>
