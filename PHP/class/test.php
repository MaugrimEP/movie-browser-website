<?php 
include_once('BD.class.php');

$bd=new BD();
$bd->creationFilms();

$result = $bd->fdb->query('SELECT * from FILMS order by code_film');
foreach($result as $m)
{
	echo "<br/>\n".$m['code_film']." ".$m['titre_original'];
}



?>