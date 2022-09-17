<?php
//variable par méthode POST : [idFilm=l'id du film]
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
if (isset($_GET['deleting']))
{
  $db->deleteFilmStatm($_GET['idFilm']);
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Recherche Avancée</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
  <h2>Résultat recherche avancée</h2>
  <?php
  $titre_original=simpleArray2String($_GET['titre_O']);
  $titre_francais=simpleArray2String($_GET['titre_F']);
  $pays=simpleArray2String($_GET['pays']);
  $nomR=simpleArray2String($_GET['nomR']);
  $prenomR=simpleArray2String($_GET['prenomR']);
  $duree=simpleArray2String($_GET['duree']);


  $res=$db->advancedSearch($titre_original,$titre_francais,$pays,$nomR,$prenomR,$duree);
  echo "<table>\n";
  echo "<tr><th> Titre original </th> <th> Titre francais </th> <th> Date </th> <th> Durée </th> <th>nom Réalisateur </th><th> prénom Realisateur </th> <th> Pays </th></tr>\n";
  foreach($res as $r)
  {
    echo "<tr>\n";
    echo "<td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_original] </a></td>
    <td><a href='one_movie_one_page.php?idFilm=$r[code_film]'> $r[titre_francais] </a></td>
    <td> $r[date] </td> <td> $r[duree] </td> <td> $r[nom]</td><td> $r[prenom]</td> <td> $r[pays]</td>
    <td><a href='add_update.php?idFilm=$r[code_film]&action=update'> Modifier</a> </td>

    <form method='get' action='display_advanced_research.php'>
    <td><input type='hidden' name='idFilm' value='$r[code_film]'/>
    <input type='hidden' name='deleting' value='true'/>


    <input type='hidden' name='titre_O[]' value='$titre_original'/>
    <input type='hidden' name='titre_F[]' value='$titre_francais'/>
    <input type='hidden' name='pays[]' value='$pays'/>
    <input type='hidden' name='nomR[]' value='$nomR'/>
    <input type='hidden' name='prenomR[]' value='$prenomR'/>
    <input type='hidden' name='duree[]' value='$duree'/>

    <input type='submit' value='Supprimer'> </td>
    </form>\n";
    echo "</tr>\n";
  }
  echo "</table>\n";
  ?>
  </article>
</body>
</html>
