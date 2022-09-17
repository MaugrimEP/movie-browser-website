<?php
include_once('Question.class.php');
class Select extends Question
{
	public $description_case;
	public $values;

	public function __construct($d,$dc,$v)
	{
		parent::__construct($d);
		$this->description_case=$dc;
		$this->values=$v;
	}

	public function affiche()
	{
		if (isset($this->cssClass))
		{
			echo "<div class='$this->cssClass'>";
		}
		echo "<label>$this->description</label>\n";
		echo "<select name=\"$this->name[]\" >\n";

		for($i=0;$i<count($this->values);$i++)
		{
			echo "<option value=\"".$this->values[$i]."\">".$this->description_case[$i]." </option>\n";
		}

		echo "</select><br>\n";

		if (isset($this->cssClass))
		{
			echo "</div>";
		}
		echo "\n";
	}
}
?>
