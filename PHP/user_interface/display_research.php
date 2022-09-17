<?php
require_once('../class/BD.class.php');
//variable typeRecherche=fast/advanced

function display($res)
{
  echo "<table>\n";
  echo "<tr><th> Titre du film </th> <th> Titre francais </th> <th> Date </th> <th> Durée </th> <th> Réalisateur </th></tr>\n";
  foreach($res as $r)
  {
    echo "<tr>\n";
    echo "<td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_original] </a></td> <td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_francais] </a></td> <td> $r[date] </td> <td> $r[duree] </td> <td> $r[nom] $r[prenom]</td> <td> Modifier </td> <td> Supprimer </td>\n";
    echo "</tr>\n";
  }
  echo "</table>\n";
}

$co=new BD('../class/base_stock/database');
if ($_GET['typeRecherche']=='fast')
{
$res=$co->getFastSearch($_GET['keyResearch']);
display($res);
}
?>
