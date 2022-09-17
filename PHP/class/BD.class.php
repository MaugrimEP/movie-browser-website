<?php
class BD
{
	public $fdb;
	public function __construct($chemin)
	{
		try
		{
			//creation de la base de donnée
			$this->fdb = new PDO('sqlite:'.$chemin.'.sqlite3');
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

	public function getFastSearchStmt($key)
	{
		try
		{
			$research="select *
			from Films
			where titre_original like '%$key%' or titre_francais like '%:key%'";
			$stmt = $this->fdb->prepare($research);

			$stmt->bindParam(':key',$key);

			$re=$stmt->execute();
			return $re;
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
			set_time_limit(0);
			$re=$this->fdb->query("select *
			from Films inner join Individus on (Films.realisateur=Individus.code_indiv)
			where titre_original like '%$key%' or titre_francais like '%$key%'
			order by titre_original");
			return $re;
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function getInfoFilm($id)
	{
		try {
			set_time_limit(0);
			$re=$this->fdb->query("select *
			from Films inner join Individus on (Films.realisateur=Individus.code_indiv)
			 where code_film=".$id);
			return $re;
		} catch (PDOException $e) {
				echo $e->getMessage();
		}
	}

	public static function getAttributFromSimpleRow($row)
	{
		foreach($row as $r)
		{
			return $r;
		}
	}

	public function deleteFilmStatm($idF)
	{
		$deleting=array(
		"delete from acteurs where ref_code_film=:key",
		"delete from classification where ref_code_film=:key",
		"delete from films where code_film=:key");
		try
		{
			foreach($deleting as $d)
			{
				$stmt = $this->fdb->prepare($d);
				$stmt->bindParam(':key',$idF);
				$stmt->execute();
			}
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getTenFirstRows()
	{
		set_time_limit(0);
		try
		{
			$r=$this->fdb->query("select * from Films inner join Individus on (Films.realisateur=Individus.code_indiv) order by date DESC limit 10");
			return $r;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>
