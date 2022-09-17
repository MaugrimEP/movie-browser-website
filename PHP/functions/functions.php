<?
require_once('../class/inputs/Text.class.php');
require_once('../class/inputs/CheckBox.class.php');
require_once('../class/inputs/Radio.class.php');
require_once('../class/inputs/Range.class.php');
require_once('../class/inputs/Select.class.php');
require_once('../functions/functions.php');

function displayFast($res)
{
  echo "<table class='pure-table'>\n";
  echo "<thread><tr><th> Titre original </th> <th> Titre francais </th> <th> Date </th> <th> Durée </th> <th>nom Réalisateur </td><th> prénom Realisateur </th> <th> Pays </th></tr></thread>\n";
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


function displayHome($res)
{
  echo "<table class='pure-table'>\n";
  echo "<thread><tr><th> Titre du film </th> <th> Titre francais </th> <th> Date </th> <th> Durée </th> <th> Réalisateur </th></tr></thread>\n";
  foreach($res as $r)
  {
    echo "<tr>\n";
    echo "<td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_original] </a></td>
    <td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_francais] </a></td>
    <td> $r[date] </td> <td> $r[duree] </td> <td> $r[nom] $r[prenom]</td>";
    echo "</tr>\n";
  }
  echo "</table>\n";
}

function paysRows2Array($rows)
{
  $res=array();
  foreach($rows as $r)
  {
    $res[] = $r['pays'];
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
    echo "$a[nom] $a[prenom]<br>";
    echo "</li>\n";
  }
  echo "</ul>";
}

?>
