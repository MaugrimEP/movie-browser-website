<?php
require_once('../class/BD.class.php');
// variable $_GET[idFilm]
	function creationPageFilm($code_f)
	{
		$db=new BD('../class/base_stock/database');
			$film=$db->getInfoFilm($code_f);
			$film=BD::getAttributFromSimpleRow($film);
			echo "<h1> $film[titre_francais]</h1>\n";
			echo "<h2>($film[titre_original]) </h2>\n";
			echo '<img src="../data/Image/test.jpg"/><br>';
			echo "<table>
					<tr>
						<td> Titre Original </td>
						<td> $film[titre_original]</td>
					</tr>
					<tr>
						<td> Titre Français </td>
						<td> $film[titre_francais] </td>
					</tr>
					<tr>
						<td> Origine </td>
						<td> $film[pays]</td>
					</tr>
					<tr>
						<td> Date de Sortie </td>
						<td> $film[date]</td>
					</tr>
					<tr>
						<td> Durée du film </td>
						<td> $film[duree] </td>
					</tr>
					<tr>
						<td> Type d'image </td>
						<td> $film[couleur]</td>
					</tr>
					<tr>
						<td> Réalisateur </td>
						<td> $film[nom] $film[prenom]</td>
					</tr>
				</table>";
	}
creationPageFilm($_GET['idFilm']);
?>
