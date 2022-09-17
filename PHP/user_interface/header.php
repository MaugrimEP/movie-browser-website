<?php
function headerShow()
{
  echo "
  <form id = 'form_header' method='get' action='display_fast_research.php'>
  <ul id='list_header'>
    <li class = 'elem_list_header'><a class = 'contenu_elem_liste_header lien_header' href ='home.php'><div class = 'animation_header'>Accueil</div></a></li>
    <li class = 'elem_list_header'><a class = 'contenu_elem_liste_header lien_header' href='add_update.php?action=add'><div class = 'animation_header'>Ajouter un film</div></a></li>
    <li class = 'elem_list_header'><a class = 'contenu_elem_liste_header lien_header' href='advanced_research.php'><div class = 'animation_header'>Recherche Avancée</div></a></li>
    <li class = 'elem_list_header'><a class = 'contenu_elem_liste_header lien_header' href='acteurs_search.php'><div class = 'animation_header'>Rechercher un film par acteur</div></a></li>
    <li class = 'elem_list_header'><input id = 'search_bar' class = 'contenu_elem_liste_header' type='text' name='keyResearch' placeholder = 'Recherche...'><input id = 'search_button' type='submit' value=''></li>
  </ul>
  </form>";
}
?>
