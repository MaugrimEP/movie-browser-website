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

	public function getFastSearch($key)
	{
		try
		{
			set_time_limit(0);
			$stmt=$this->fdb->prepare("select *
			from Films inner join Individus on (Films.realisateur=Individus.code_indiv)
			where titre_original like ? or titre_francais like ?
			order by titre_original");
			$stmt->execute(array(BD::toStmt($key)));
			return $stmt;
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getInfoFilm($id)
	{
		try
		{
			set_time_limit(0);
			$q="select *
			from Films inner join Individus on (Films.realisateur=Individus.code_indiv) inner join Classification on (Films.code_film=Classification.ref_code_film) inner join Genres on (Classification.ref_code_genre=Genres.code_genre)
			where code_film= ?";
			$stmt=$this->fdb->prepare($q);
			$stmt->execute(array($id));
			return $stmt;
		}
		catch (PDOException $e) {
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

	public function getPays()
	{
		set_time_limit(0);
		try
		{
			$r=$this->fdb->query("select distinct pays from Films order by pays");
			return $r;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function dureeMax()
	{
		set_time_limit(0);
		try
		{
			$r=$this->fdb->query("select max(duree) from Films");
			foreach($r as $rs)
			{
				return $rs['max(duree)'];
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function advancedSearch($titre_O,$titre_F,$pays,$nomR,$prenomR,$duree)
	{

		set_time_limit(0);
		$q="select *
		from Films inner join Individus on (Films.realisateur=Individus.code_indiv)
		where titre_original like ? and titre_francais like ? and pays like ? and nom like ? and prenom like ? and duree>=?";
		try
		{
			$stmt=$this->fdb->prepare($q);
			$stmt->execute(array(BD::toStmt($titre_O),BD::toStmt($titre_F),BD::toStmt($pays),BD::toStmt($nomR),BD::toStmt($prenomR),$duree));
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	public static function toStmt($key)
	{
		return '%'.$key.'%';
	}

	public function getActeurbyFilms($idF)
	{
		$q="select distinct nom,prenom
		from Films inner join Acteurs on (Films.code_film=Acteurs.ref_code_film) inner join Individus on (Acteurs.ref_code_acteur=Individus.code_indiv)
		where code_film=?";
		try
		{
			$stmt=$this->fdb->prepare($q);
			$stmt->execute(array($idF));
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

}
?>
