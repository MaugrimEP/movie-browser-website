<?php
include_once('Question.class.php');
class Submit extends Question
{
	public function __construct($d,$v)
	{
		parent::__construct($d);
		$this->type="submit";
    $this->value=$v;
	}

	public function affiche()
	{
		echo "<input ";
		if (isset($this->cssClass))
		{
			echo "id='$this->cssClass'";
		}
		echo " type=\"$this->type\" name=\"$this->name[]\" value=\"$this->value\"><br>\n" ;
		echo "\n";
	}
}
?>
