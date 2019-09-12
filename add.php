<?php
	
	include_once('header.php');
 ?>

<br>	
	
											
<?php 

$showform = true;
if(isset($_SESSION['isAdmin']) && ! $_SESSION['isAdmin'])
{
	header('Location: index.php');
	exit();
}


					if(!empty($_POST['name1'])&&!empty($_POST['quantity1'])&&!empty($_POST['price1'])&&!empty($_POST['description1']))
{
	
																	//database connections echo'successfully submitted<br>';
					$mysqli = new mysqli('localhost', 'root', '' );

					if (!$mysqli) 
					{
					 die('Could not connect:');        						//. mysqli_error($mysqli)//
					}
																	//echo 'Connected successfully to mySQL. <BR>';
					 
					$mysqli->select_db("storeappliacation");
																	// echo ("Selected the  database<br>");
 
 
 // Database entry part

	 $name1=$_POST['name1'];
	 $quantity1=$_POST['quantity1'];
	 $price1=$_POST['price1'];
	 $description1=$_POST['description1'];
    $query ="insert into item (`item-name`,`item_quantity`,`item_price`,`item_description`) values('$name1','$quantity1','$price1','$description1')";

	//echo $query.'<br>';	 
	 if($result=$mysqli->query($query))
	 { 
		 echo '<h2 class="text-center text-success">Item Successfully Added</h2>';
		 echo '<h4 class="text-center text-secondary"><b>Item Name:</b>'.$name1.'</h4>';
	 }
	 else
	 { 
		//echo'error in entering value';
		  echo '<h2 class="text-center text-danger">Failed To Add Item</h2>';
		 
	 }
	
	$showform=false;			


}
 

 if($showform==false)
 {
	 echo '<div class="col-sm-12 text-center"><a href="item.php"><button class="btn btn-primary mt-3">Show All Products</button></a></div>';
	 
 }
 
 

 else{ 
 ?>
	<!DOCTYPE html>
<html>
<head>
</head>
<body>

                                            <!--division section for table display-->
											
<div class="container" style ="background-color:#f1f1f1">
	<div class="row">
		<div class="col-12">
			<form class="form-horizontal" action ="add.php" method="POST">
			<h2 style="text-align:center">Add Item</h2><hr></br>	

			
			<div class="form-group">
					<label class="control-label col-sm-2" >NAME</label><input class="col-sm-10" type="text" name="name1" placeholder ="Enter item name"/>	
			</div>

		  <div class="form-group">
					<label class="control-label col-sm-2" >QUANTITY</label><input class="col-sm-10" type="number" name="quantity1" placeholder ="Enter item quantity"/>	
			</div>

			<div class="form-group">
					<label class="control-label col-sm-2" >PRICE</label><input class="col-sm-10" type="number" name="price1" placeholder ="Enter item price"/>	
			</div>

			<div class="form-group">
					<label class="control-label col-sm-2" >DESCRIPTION</label><input class="col-sm-10" type="text" name="description1" placeholder ="Enter item description"/>	
			</div>

			<h5 style="text-align:center"><button class="btn btn-primary" >ADD ITEM</button></h5>
			
			</form>
			
		</div>
	</div>
</div>
<body/>


</html> 
<?php	 
 }
 
 ?>


