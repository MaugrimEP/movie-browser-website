<?php
function headerShow()
{
  echo "
  <form method='get' action='display_fast_research.php'>
  <ul>
    <li><a href ='home.php'>Home</a></li>
    <li><a href='add_update.php?action=add'>Ajouter un film</a></li>
    <li><a href='advanced_research.php'>Recherche Avancée</a></li>
    <li><input type='text' name='keyResearch'><input type='submit' value='Search'></li>
  </ul>
  </form>";
}
?>
