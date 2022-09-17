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
    echo "<td> $r[titre_original] </td> <td> $r[titre_francais] </td> <td> $r[date] </td> <td> $r[duree] </td> <td> $r[realisateur] </td>\n";
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
