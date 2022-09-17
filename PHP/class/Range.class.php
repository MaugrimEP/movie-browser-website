<?php
include_once('Question.class.php');
class Range extends Question
{
	
	public $value;
	public $min;
	public $max;
	public $step;

	public function __construct($d,$mi,$ma,$s)
	{
		parent::__construct($d);
		$this->type="range";
		
		$this->value=0;
		$this->min=$mi;
		$this->max=$ma;
		$this->step=$s;
	}

	public function affiche()
	{
		echo "$this->description <br><input type=\"$this->type\" name=\"$this->name[]\" value=\"$this->value\" max=\"$this->max\" min=\"$this->min\" step=\"$this->step\" onchange=\"rangevalue.value=value\">
		<output id=\"rangevalue\">0</output> % <br>\n" ;
		echo "\n";

	}
}

?>