
<?php
	
	include_once('header.php');
 ?>

<?php 

if(isset ($_SESSION["username"]))
{

?>
			

<h2 class='text-center'>Already Logged In</h2><br>
<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<a href="index.php"> <button class='btn btn-primary text-center'>Home</button></a>
			<a href="logoutsessiondestroy.php"> <button class='btn btn-danger text-center'>Logout</button></a>
		</div>
	</div>
</div>

 

<?php
exit();
}

$showform = true;


if(!empty($_POST['email2'])&& !empty($_POST['name2'])&& !empty($_POST['dob2'])&& !empty($_POST['contact2'])&& !empty($_POST['address2'])&& !empty($_POST['password2'])&& !empty($_POST['confirmpassword2']) )
  {
		$len= strlen($_POST['contact2']);
		$b1=$_POST['password2']==$_POST['confirmpassword2'];
		$b2=$len == 10;

		if($b1!=true)				
		{
			
			echo "<br><h2 class='text-center text-danger'>Confirm password doesnot match</h2><br>";
		}
		
		if($b2!=true)
		{
			echo "<br><h2 class='text-center text-danger'>Contact No. should be of 10 digits</h2><br>";
			
		}  
		
		if($b1==true&&$b2==true)
		{
	 
	 
		  $mail=$_POST['email2'];
		  $name=$_POST['name2'];
		  $dob=$_POST['dob2'];
		  $contact=$_POST['contact2'];
		  $address=$_POST['address2'];
		  $password=$_POST['password2'];
		  $confirmpassword=$_POST['confirmpassword2'];
		  
		

		  

		//database connection
	
		$mysqli = new mysqli('localhost', 'root', '' );

		if (!$mysqli) 
		{
		 die('Could not connect:');        						
		}
		//echo 'Connected successfully to mySQL. <BR>';
		 
		$mysqli->select_db("storeappliacation");
		
		// database entry part
				
				
				
			$query ="insert into userdetail (`email`,`name`,`dob`,`contact`,`address`,`password`) values('$mail','$name','$dob','$contact','$address','$password')";

		//echo $query.'<br>';	 
		 if($result=$mysqli->query($query))
		 {
			 
			// echo 'you have successfully entered values'.$to.' and  '.$subject.' and '.$message;
			$showform=false;
?>
			
			<h2 class="text-center text-success">Registration Successful</h2>
			<h4 class="text-center">Please Login To Access Kiran's Sports Store</h4>
			<div class="col-12 m-4 text-center">
				<a href="login.php"><button class="btn btn-outline-success">Login</button></a>
			</div>
			

<?php

		 }

	
		 else
		 { 
			//echo'error in entering value';
			 echo "<br><h2 class='text-center text-danger'>Failed To Register</h2><br>";
		 
		 }	
		
	}	
	
	else
	{
		
		$showform=true;
	}
}
 ?>
 
 <?php

 if($showform==false)
 {	
// header("Location:login.php");
//echo'hii'; 
 }
 
 

 else
 { 
?>

<div class="container" style ="background-color:#f1f1f1; padding:50px;">										
			<form class="form-horizontal" action ="registration.php" method="POST">
			
				<h2 class="text-center">Register your account in Kiran's Sports Store</h2>
				<br>
				<hr>
			
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">E-Mail</label><input class="col-sm-10" type="email" name="email2" required placeholder ="Enter E-mail id"/>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Name</label><input class="col-sm-10" type="text" name="name2" required placeholder ="Enter Name"/>	
				</div>
				
				<label class="control-label col-sm-2">Date Of Birth</label><input class="col-sm-10" type="date" name="dob2" required placeholder ="Enter date of birth"/><br>

				<label class="control-label col-sm-2">Contact No.</label><input class="col-sm-10" type="number" name="contact2" required placeholder ="Enter Contact No."/><br>

				<label class="control-label col-sm-2">Address</label><input class="col-sm-10" type="textarea" name="address2" required placeholder ="Enter Address"/><br>

				<label class="control-label col-sm-2">Password</label><input class="col-sm-10" type="password" name="password2" required placeholder ="Enter Password"/><br>

				<label class="control-label col-sm-2">Confirm Password</label><input class="col-sm-10" type="password" name="confirmpassword2" required placeholder ="Re enter password"/><br>
				
				<div class="col-12 text-center m-3">
					<button class="btn btn-outline-primary" type="submit" >REGISTER</button>
				</div>
				
			</form>	
</div>

</body>


</html>
	 
<?php	 
 }
 
 ?>


