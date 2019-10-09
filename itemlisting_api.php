<?php 
	//database connection
			
$mysqli = new mysqli('localhost', 'root', '' );

	if (!$mysqli) 
	{
	 	$err=array("message"=>"Could not connect to database");
		echo json_encode($err);
		exit();       						
	}
//	echo 'Connected successfully to mySQL. <BR>';
	 
	$mysqli->select_db("storeappliacation");

	
	// code for output of table content
	
	$sql = "select `id`,`item-name`,`item_price`,`item_description` from item";

	$result1 = $mysqli->query($sql);
 
	 
	if ($result1->num_rows > 0) 
	{
		$allRows=$result1->fetch_all(MYSQLI_ASSOC);
		echo json_encode($allRows);
	}
	else
	{
		$err=array("message"=>"Data not found");
		echo json_encode($err);
	}

?>