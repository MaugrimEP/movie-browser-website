<?php
abstract class Question
{
	public $name;
	public $type;
	public $description;

	public function __construct($d)
	{
		$this->name="champ";
		$this->description=$d;
		
		
	}
	
	public abstract function affiche();
}
?>