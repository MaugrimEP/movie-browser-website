<?php
function headerShow()
{
  echo "
  <form method='get' action='display_research.php'>
  <input type='hidden' name='typeRecherche' value='fast'/>
  <ul>
    <li><a href='add_update.php?action=add'>Ajouter un film</a></li>
    <li><a href='advanced_research.php'>Recherche Avancée</a></li>
    <li><input type='text' name='keyResearch'><input type='submit' value='Search'></li>
  </ul>
  </form>";
}
?>
