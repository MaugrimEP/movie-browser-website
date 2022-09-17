<?php
require_once('DataDB.php');


class BD
{
	public $fdb;
	public function __construct()
	{
		try
		{
			//creation de la base de donnée
			$this->fdb = new PDO('sqlite:base_stock/database.sqlite3');
			//Gerer le niveau des erreurs rapportees
			$this->fdb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function creationFilms()
	{
		try
		{
		//$this->fdb->exec('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
		//$this->fdb->exec('SET time_zone = "+00:00";');
		
		$this->fdb->exec('drop table films');
	
		$this->fdb->exec("CREATE TABLE IF NOT EXISTS `films` (
  `code_film` int(11) NOT NULL  PRIMARY KEY,
  `titre_original` varchar(50) DEFAULT NULL,
  `titre_francais` varchar(50) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `couleur` varchar(10) DEFAULT NULL,
  `realisateur` int(11) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL
) ");

		$this->fdb->exec($valuesFilms);
  		}
		
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}

}
?>