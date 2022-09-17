<?php
require_once('../class/BD.class.php');
//variable typeRecherche=fast/advanced
function display($res)
{

  var_dump($res);
  foreach($res as $r)
  {
    echo $r['titre_original'].'<br>';
  }
}

$co=new BD('../class/base_stock/database');
var_dump($co);
if ($_GET['typeRecherche']=='fast')
{
$res=$co->getFastSearch($_GET['keyResearch']);
display($res);
}
?>
