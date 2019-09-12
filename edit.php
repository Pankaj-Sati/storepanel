<?php
	
	include_once('header.php');
 ?>										
											
<?php 


if(isset($_SESSION['isAdmin']) && ! $_SESSION['isAdmin'])
{
	header('Location: index.php');
	exit();
}

$showform = true;



if(!empty($_POST['name1'])&&!empty($_POST['quantity1'])&&!empty($_POST['price1'])&&!empty($_POST['description1']))
{
	 $parseid=$_POST['parseid'];
	 $name1=$_POST['name1'];
	 $quantity1=$_POST['quantity1'];
	 $price1=$_POST['price1'];
	 $description1=$_POST['description1'];
	
																
					$mysqli = new mysqli('localhost', 'root', '' );

					if (!$mysqli) 
					{
					 die('Could not connect:');        						
					}

					$mysqli->select_db("storeappliacation");
																	
 
 

	
	
	$query ="UPDATE item SET `item-name`='$name1' ,`item_quantity`='$quantity1',`item_price`='$price1',`item_description`='$description1' WHERE `id`=$parseid";
   

		//echo $query.'<br>';	 
		 if($result=$mysqli->query($query))
		 {
			 
			// echo 'you have successfully entered values'.$to.' and  '.$subject.' and '.$message;
		 }

	
		 else
		 { 
			//echo'error in entering value';
			 mysqli_error($mysqli);
		 
		 }
	
	//query for output of table															
																
			$sql = "select `id`,`item-name`,`item_quantity`,`item_price`,`item_description` from item";
			$result1 = $mysqli->query($sql);
	 
	$showform=false;			


}
 

 if($showform==false)
 {
	
	 echo'<h2 class="text-center text-success">Data Updated Successfully</h2>';
	  echo '<div class="col-sm-12 text-center mt-5"><a href="item.php"><button class="btn btn-primary">Back</button></a></div></br><hr></br>';

   	 
 }
 else
 { 

 	if(!isset($_GET['id']))
 	{
?>
		<h2 class="text-center text-danger">Item Not Found</h2>
		<div class="col-sm-12 text-center mt-5">
			<a href="index.php"><button class="btn btn-primary">Home</button></a>
		</div>
<?php

		exit();
 	}


 ?>

										
<div class="container" style ="background-color:#f1f1f1">
	<div class="row">
		<div class="col-12">
		<form class="form-horizontal" action="edit.php" method="POST">
			<h2 style="text-align:center">Edit Item Details</h2></br><hr></br>	
           
		   <?php 

			//database connections echo'successfully submitted<br>';
			$mysqli = new mysqli('localhost', 'root', '' );

			if (!$mysqli) 
			{
			 die('Could not connect:');        						//. mysqli_error($mysqli)//
			}
															//echo 'Connected successfully to mySQL. <BR>';
			 
			$mysqli->select_db("storeappliacation");
			
			
			$sql = "select `id`,`item-name`,`item_quantity`,`item_price`,`item_description` from item where `id`='".$_GET['id']."'";

			$result1 = $mysqli->query($sql);
			if ($result1->num_rows > 0) 
			{
				$row = $result1->fetch_assoc();   				
			}
			else
			{
				echo '<h2 class="text-center text-danger">Item Not Found In Database</h2>';
				exit;
			}	

		   ?>			
			
		   <div class="form-group">
					<label class="control-label col-sm-2" >Name</label><input class="col-sm-10" type="text" name="name1" value =<?php echo '"'.$row['item-name'].'"';  ?>/>	
			</div>

		  <div class="form-group">
					<label class="control-label col-sm-2" >QUANTITY</label><input class="col-sm-10" type="number" name="quantity1" value =<?php echo '"'.$row['item_quantity'].'"';  ?>/>	
			</div>

			<div class="form-group">
					<label class="control-label col-sm-2" >PRICE</label><input class="col-sm-10" type="number" name="price1" value =<?php echo '"'.$row['item_price'].'"';  ?>/>	
			</div>

				<div class="form-group">
					<label class="control-label col-sm-2" >DESCRIPTION</label><input class="col-sm-10" type="text" name="description1" value =<?php echo '"'.$row['item_description'].'"';  ?>/>	
			</div>

			
			
			<input type="hidden" value="<?php echo $_GET['id'] ?>" name="parseid" />
			
			
			<h5 style="text-align:center"><button class="btn btn-primary" >UPDATE ITEM</button></h5>
		</form>
			
		</div>
	</div>
</div>
<body/>


</html> 
<?php	 
 }
 
 ?>
