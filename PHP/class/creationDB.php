<?php
include_once('BD.class.php');
require_once('../data/DataDB.php');

$bd=new BD('base_stock/database');
$bd->creationTable($dropFilms,$creationFilms,$valuesFilms);
$bd->creationTable($dropActeurs,$creationActeurs,$valuesActeurs);
$bd->creationTable($dropClassification,$creationClassification,$valuesClassification);
$bd->creationTable($dropGenres,$creationGenres,$valuesGenres);
$bd->creationTable($dropIndividus,$creationIndividus,$valuesIndividus);

$requet=$bd->fdb->query("select * from Acteurs");
foreach($requet as $r)
{
	echo $r['ref_code_film'].' '. $r['ref_code_acteur']."<br>";
}

$requet=$bd->fdb->query("select * from Films");
foreach($requet as $r)
{
	echo $r['code_film'].' '. $r['titre_original']."<br>";
}

$requet=$bd->fdb->query("select * from Classification");
foreach($requet as $r)
{
	echo $r['ref_code_film'].' '. $r['ref_code_genre']."<br>";
}

$requet=$bd->fdb->query("select * from Genres");
foreach($requet as $r)
{
	echo $r['code_genre'].' '. $r['nom_genre']."<br>";
}

$requet=$bd->fdb->query("select * from Individus");
foreach($requet as $r)
{
	echo $r['code_indiv'].' '. $r['nom']."<br>";
}

?>
