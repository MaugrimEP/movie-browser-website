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
			$r=$this->fdb->query("select distinct pays from Films order by pays DESC");
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

	public function advancedSearch($titre_O,$titre_F,$pays,$nomR,$prenomR,$duree,$genres)
	{

		set_time_limit(0);
		try
		{
			if ($genres=="NNDEF")
			{
				$q="select *
				from Films inner join Individus on (Films.realisateur=Individus.code_indiv)
				where titre_original like ? and titre_francais like ? and pays like ? and nom like ? and prenom like ? and duree>=?";
				$stmt=$this->fdb->prepare($q);
				$stmt->execute(array(BD::toStmt($titre_O),BD::toStmt($titre_F),BD::toStmt($pays),BD::toStmt($nomR),BD::toStmt($prenomR),$duree));
			}
			else
			{
				$q="select *
				from Films inner join Individus on (Films.realisateur=Individus.code_indiv) inner join classification on (Films.code_film=Classification.ref_code_film) inner join genres on (Classification.ref_code_genre=genres.code_genre)
				where titre_original like ? and titre_francais like ? and pays like ? and nom like ? and prenom like ? and duree>=? and nom_genre==?";
				$stmt=$this->fdb->prepare($q);
				$stmt->execute(array(BD::toStmt($titre_O),BD::toStmt($titre_F),BD::toStmt($pays),BD::toStmt($nomR),BD::toStmt($prenomR),$duree,$genres));

			}
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
		$q="select distinct code_indiv,nom,prenom
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

	public function createMovie($to,$tf,$pays,$date,$duree,$couleur,$nom, $prenom,$image,$code_genre){
		$exe="INSERT INTO films (code_film,titre_original,titre_francais,pays, date, duree, couleur, realisateur, image)
		 VALUES (:code_f,:to,:tf,:pays,:d,:duree,:couleur,:realisateur,:image)";
		 set_time_limit(0);
 		try
 		{
			$newId = $this->generateCode('films','code_film');
			$this->fdb->exec("insert into classification (ref_code_film,ref_code_genre) values ($newId,$code_genre)");
			$stmt=$this->fdb->prepare($exe);
			$stmt->bindParam(':code_f',$newId);
			$stmt->bindParam(':to',$to);
			$stmt->bindParam(':tf',$tf);
			$stmt->bindParam(':pays',$pays);
			$stmt->bindParam(':d',$date);
			$stmt->bindParam(':duree',$duree);
			$stmt->bindParam(':couleur',$couleur);
			$stmt->bindParam(':realisateur',$this->findOrCreateRealisteur($nom,$prenom));
			$stmt->bindParam(':image',$image);
			$stmt->execute();
			return $newId;
 		}
 		catch(PDOException $e)
 		{
 			echo $e->getMessage();
 		}

	}

	public function generateCode($table,$colonne){
		try {
			$res=$this->fdb->query("select max($colonne) as max from $table");
			$res=BD::getAttributFromSimpleRow($res);
			return $res['max']+1;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function addActor($nom,$prenom,$idFilm){
		$addIndividus="insert into individus(code_indiv,nom,prenom) values (:code,:nom,:prenom)";
		$num=$this->generateCode('individus','code_indiv');
		$addActeurs="insert into acteurs(ref_code_film,ref_code_acteur) values (:idF,:num)";
		set_time_limit(0);
		try
		{
			$stmt=$this->fdb->prepare($addIndividus);
			$stmt->bindParam(':code',$num);
			$stmt->bindParam(':nom',$nom);
			$stmt->bindParam(':prenom',$prenom);
			$stmt->execute();

			$stmt2=$this->fdb->prepare($addActeurs);
			$stmt2->bindParam(':num',$num);
			$stmt2->bindParam(':idF',$idFilm);
			$stmt2->execute();

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	public function getGenres()
	{
		set_time_limit(0);
		try
		{
			$res=$this->fdb->query("select distinct * from genres order by nom_genre DESC");
			return $res;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getFilmsByActeur($idActeur)
	{
		$q="select distinct code_film,titre_original, titre_francais
		from Films inner join Acteurs on (Films.code_film=Acteurs.ref_code_film)
		where ref_code_acteur=?";
		try
		{
			$stmt=$this->fdb->prepare($q);
			$stmt->execute(array($idActeur));
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getActeurs()
	{
		set_time_limit(0);
		try
		{
			$res=$this->fdb->query("select distinct ref_code_acteur,nom,prenom from acteurs inner join Individus on (acteurs.ref_code_acteur=individus.code_indiv) order by nom,prenom");
			return $res;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getInfoPpl($a)
	{
		$q="select * from individus where code_indiv=?";
		try
		{
			$stmt=$this->fdb->prepare($q);
			$stmt->execute(array($a));
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function getGenresbyFilms($idF)
	{
		set_time_limit(0);
		$q="select distinct nom_genre
				from Films inner join Classification on (Films.code_film=Classification.ref_code_film) inner join Genres on (Classification.ref_code_genre=Genres.code_genre)
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

	public function getFilmsByRealisteur($realisteur)
	{
			$q="select distinct code_film,titre_original, titre_francais
			from Films
			where realisateur=?";
			try
			{
				$stmt=$this->fdb->prepare($q);
				$stmt->execute(array($realisteur));
				return $stmt;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
	}

	public function findOrCreateRealisteur($nom,$prenom)
	{
		$q="select *
		from films inner join individus on (films.realisateur=individus.code_indiv)
		where nom=:nom and prenom=:prenom";
		try
		{
			$stmt=$this->fdb->prepare($q);
			$stmt->bindParam(':nom',$nom);
			$stmt->bindParam(':prenom',$prenom);
			$stmt->execute();
			if (sqlite_num_rows($stmt)==0)
			{
				$insertion="insert into Individus(code_indiv,nom,prenom) values (:id,:nom,:prenom)";
				$stmtInsertion=$this->prepare($insertion);
				$id=$this->fdb->generateCode('individus','code_indiv');
				$stmtInsertion->bindParam(':id',$id);
				$stmtInsertion->bindParam(':nom',$nom);
				$stmtInsertion->bindParam(':prenom',$prenom);
				$stmtInsertion->execute();
				return $id;
			}
			else
			{
				$stmt=BD::getAttributFromSimpleRow($stmt);
				return $stmt['code_indiv'];
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>
