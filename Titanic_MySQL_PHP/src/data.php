<?php

//data.php

$connect = new PDO("mysql:host=localhost;dbname=titanicdatabase;charset=utf8", "root", "");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch_sex')
	{
		$query = "
		SELECT Sex, COUNT(id) AS Total 
		FROM titanic_table
		WHERE Survived = 1
		GROUP BY Sex 
		";
	}
	if($_POST["action"] == 'fetch_pclass')
	{
		$query = "
		SELECT Pclass, COUNT(id) AS Total 
		FROM titanic_table 
		WHERE Survived = 0
		GROUP BY Pclass 
		";
	}
		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'total'		=>	$row["Total"],
			);
		}
		
		echo json_encode($data);
}
$result = null;
$connect = null;
?>
