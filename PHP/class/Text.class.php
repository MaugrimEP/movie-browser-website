<?php
include_once('Question.class.php');
class Text extends Question
{


	public function __construct($d)
	{
		parent::__construct($d);
		$this->type="text";
	}

	public function affiche()
	{
		echo "$this->description <br><input type=\"$this->type\" name=\"$this->name[]\"><br>\n" ;
		echo "\n";
	}
	
}

?>