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
  <meta charset="utf-8">
  <title>resultat recherche</title>
</head>
<body>
  <header><?php headerShow();?></header>
  <article>
    <h2>La liste des films fait par le réalisateur <?php echo $infosRealisteur['nom'];echo $infosRealisteur['prenom'];?></h2>
    <table>
      <tr><th>Titre original</th><th>Titre francais</th></tr>
      <?php foreach ($films as $f)
      {
        echo "<tr><td> ";
        echo linkToFilm($f['titre_original'],$f);
        echo "</td>  <td>";
        echo linkToFilm($f['titre_francais'],$f);
        echo "</td></tr>";
      }?>
    </table>
  </article>
  <?php importJavascriptShow() ?>
</body>
</html>
