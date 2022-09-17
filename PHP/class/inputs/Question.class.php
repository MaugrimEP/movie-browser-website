<?php
abstract class Question
{
	public static $numero=0;
	public $name;
	public $type;
	public $description;

	public function __construct($d)
	{
		self::$numero++;
		$this->name="champ".self::$numero;
		$this->description=$d;
	}

	public abstract function affiche();
}
?>
