<?php
require_once('../class/BD.class.php');
require_once('../functions/functions.php');
//variable typeRecherche=fast/advanced

$co=new BD('../class/base_stock/database');
if (isset($_GET['deleting']))
{
  $co->deleteFilmStatm($_GET['idFilm']);
}

if($_GET['typeRecherche']=='fast')
{
  $res=$co->getFastSearch($_GET['keyResearch']);
  display($res);
}
?>
