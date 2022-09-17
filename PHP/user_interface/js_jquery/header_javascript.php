<?php
require_once('../../class/BD.class.php');

$co = new BD("../../class/base_stock/database");

$chaine = $_GET['recherche'];
$res = $co->getFastSearch($chaine);

?>

<ul id = 'liste_recherche'>
	<?php 
	foreach ($res as $film){
		echo "<li class = 'elem_liste_recherche'><a class = 'lien_recherche' href ='one_movie_one_page.php?idFilm=".$film['code_film']."'><div class = 'grand_div_recherche'><img src='../data/Image/".$film['image']."' alt='' height='75'/><div class = 'div_recherche'>".$film['titre_francais']."</div></div></a></li><hr class = 'proposition_separation'>";
	}
	?>
</ul>
