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
		if (isset($this->cssClass))
		{
			echo "<div class='$this->cssClass'>";
		}
		echo "<input type=\"$this->type\" name=\"$this->name[]\" value=\"$this->value\"><br>\n" ;
		if (isset($this->cssClass))
		{
			echo "</div>";
		}
		echo "\n";
	}
}
?>
