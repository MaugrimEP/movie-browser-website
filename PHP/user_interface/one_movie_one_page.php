<?php
	include 'BD.class.php';
	
	public function creationPageFilm($code_f)
	{
			$film=$fdb->('SELECT * FROM films where code_film='.$code_f);
			echo '<h1>'.$film['titre_francais'].'('.$film['titre_original'].') </h1>';
			echo '</img src="../Image/'.$film['image'].'" alt="image du film '.$film['titre_francais'].'">';
			echo '<table> 
					<tr>
						<td> "Titre Original" </td>
						<td> "'.$film['titre_original'].'" </td>
					</tr>
					<tr>
						<td> "Titre Français" </td>
						<td> "'.$film['titre_francais'].'" </td>
					</tr>
					<tr>
						<td> "Origine" </td>
						<td> "'.$film['pays'].'" </td>
					</tr>
					<tr>
						<td> "Date de Sortie" </td>
						<td> "'.$film['date'].'" </td>
					</tr>
					<tr>
						<td> "Durée du film" </td>
						<td> "'.$film['duree'].'" </td>
					</tr>
					<tr>
						<td> "Film en couleur" </td>
						<td> "'.if(strcmp($film['couleur'],'NB')==0)
								{echo "Non";}
								else
								{echo "Oui";}.'" </td>
					</tr>
					<tr>
						<td> "Réalisateur" </td>
						<td> "'.$film['realisateur'].'" </td>
					</tr>
				</table>';
	}
?>
