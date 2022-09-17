<?php
include_once('Question.class.php');

class Radio extends Question
{
	public $description_case;

	public $values;


	public function __construct($d,$dc,$v)

	{
		parent::__construct($d);

		$this->type="radio";

		$this->description_case=$dc;

		$this->values=$v;

	}



	public function affiche()

	{

		echo "$this->description <br>";
		echo "\n";


		for($i=0 ; $i<count($this->values);$i++)

		{
			if (isset($this->cssClass))
			{
				echo "<div class='$this->cssClass'>";
			}
			echo '<label>'.$this->description_case[$i].'</label><input type="'.$this->type.'" value="'.$this->values[$i].'" name="'.$this->name.'[]"><br>';
			if (isset($this->cssClass))
			{
				echo "</div>";
			}
			echo "\n";

		}

		echo "\n";

	}

}

?>
