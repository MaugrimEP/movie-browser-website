<?php
class BD
{
	public $fdb;
	public function __construct($chemin)
	{
		try
		{
			//creation de la base de donnée
			$this->fdb = new PDO('sqlite:'.$chemin.'sqlite3');
			//Gerer le niveau des erreurs rapportees
			$this->fdb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}

		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}


	public function creationTable($drop,$creation,$insertionRequest)
	{
		try
		{
			//$this->fdb->exec('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
			//$this->fdb->exec('SET time_zone = "+00:00";');

			$this->fdb->exec($drop);

			$this->fdb->exec($creation);
			foreach($insertionRequest as $i)
			{
				$this->fdb->exec($i);
			}
  	}

		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getFastSearch($key)
	{
		try
		{
			$research="select distinct *
			from Films natural left outer join Acteurs natural left outer join Classification natural left outer join Genres natural left outer join Individus
			where titre_original like '%:key%' or titre_francais  like '%:key%' or realisateur like '%:key%' or nom_genre like '%:key%' or nom like '%:key%' or prenom like '%:key%'
			";
			$stmt = $this->fdb->prepare($research);

			$stmt->bindParam(':key',$k);
			$k=$key;

			$re=$stmt->execute();
			return $re;
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>
