<?
function display($res)
{
  echo "<table>\n";
  echo "<tr><th> Titre du film </th> <th> Titre francais </th> <th> Date </th> <th> Durée </th> <th> Réalisateur </th></tr>\n";
  foreach($res as $r)
  {
    echo "<tr>\n";
    echo "<td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_original] </a></td>
    <td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_francais] </a></td>
    <td> $r[date] </td> <td> $r[duree] </td> <td> $r[nom] $r[prenom]</td>
    <td><a href='add_update.php?idFilm=$r[code_film]&action=update'> Modifier</a> </td>
    <form method='GET' action='display_research.php'>
    <td><input type='hidden' name='idFilm' value='$r[code_film]'/>
    <input type='hidden' name='deleting' value='true'/>
    <input type='hidden' name='typeRecherche' value='$_GET[typeRecherche]'/>
    <input type='hidden' name='keyResearch' value='$_GET[keyResearch]'/>
    <input type='submit' value='Supprimer'</td>
    </form>\n";
    echo "</tr>\n";
  }
  echo "</table>\n";
}

function displayHome($res)
{
  echo "<table>\n";
  echo "<tr><th> Titre du film </th> <th> Titre francais </th> <th> Date </th> <th> Durée </th> <th> Réalisateur </th></tr>\n";
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

?>
