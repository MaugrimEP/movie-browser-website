<?php
require_once('../data/require_once.php');
$db=new BD($pathToDBFromUserInterface);
$infosActeur=$db->getInfoActeur(simpleArray2String($_GET['acteurs']));
$infosActeur=BD::getAttributFromSimpleRow($infosActeur);
$films=$db->getFilmsByActeur(simpleArray2String($_GET['acteurs']));


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
    <h2>La liste des films fait par l'acteur <?php echo $infosActeur['nom'];echo $infosActeur['prenom'];?></h2>
    <ul>
      <?php foreach ($films as $f)
      {
        echo "<li>";
        echo "<a href='one_movie_one_page.php?idFilm=$f[code_film]'>$f[titre_original] titre francais : $f[titre_francais]</a>";
        echo "</li>";
      }?>
    </ul>
  </article>
</body>
</html>
