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
		if (isset($this->cssClass))
		{
			echo "<div class='$this->cssClass'>";
		}
		echo "<label>$this->description</label><input type=\"$this->type\" name=\"$this->name[]\">\n" ;
		if (isset($this->cssClass))
		{
			echo "</div>";
		}
		echo "<br>\n";
	}

}

?>
