<?php

session_start();

require_once 'conf.php';

if(isset($_SESSION['u_name']) and !empty($_SESSION['u_name'])) {
	
	$u_name = $_SESSION['u_name'];
	
	$query = "select * from users 
					where Username = '$u_name'"; 
					
	$result = mysqli_query($con,$query);
			
	$row = mysqli_fetch_assoc($result);
				
	echo "Welcome, ".$row['Name'].".<br/>";
	echo "Have a nice time.";
	
	echo "<br/>
					  <br/>
					  <center>
					  <form action = 'logout.php' method = 'post'>
						<input type ='submit' value = 'Logout' name = 'logout'>
					  </center>
					  </form>";
				
} else {
	
	header("location:index.php");
	
	}
		
?>

