<?php
abstract class Question
{
	public $name;
	public $type;
	public $description;

	public function __construct($d)
	{
		self::$nbQuestion ++;
		$this->name="champ".self::$nbQuestion;
		$this->description=$d;
		
		
	}
	
	public abstract function affiche();
}
?>