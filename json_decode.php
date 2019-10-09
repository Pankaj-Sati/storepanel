<?php 

	
	
	$jsonData = '[{"id":"34","item-name":"BaseBall","item_price":"900","item_description":"My Baseball Stock"},{"id":"36","item-name":"Cricket Bat","item_price":"4000","item_description":"My Cricket Stock"},{"id":"37","item-name":"Cricket Ball","item_price":"150","item_description":"My Cricket balls collection"},{"id":"38","item-name":"Tennis","item_price":"1200","item_description":"Tennis Racket Made in India"}]';
	 
	$decodedJson=json_decode($jsonData);
	if($decodedJson)
	{
			//Json data was successfully decoded

		?>

		<table>
			<tr>
				<th>Id</th>
				<th>Price</th>
				<th>Description</th>
			</tr>

		<?php

			for($i=0;$i<count($decodedJson);$i++)
			{		
				echo '<tr>';
				echo '<td>'.$decodedJson[$i]->id.'</td>';
				echo '<td>'.$decodedJson[$i]->item_price.'</td>';
				echo '<td>'.$decodedJson[$i]->item_description.'</td>';

				echo '</tr>';
			}
	}
	else
	{
		echo '<h2>Cannot decode</h2>';
	}

	
?>
