<?php

if($con = mysqli_connect('localhost','root','123') 
			and mysqli_select_db($con,'details')) {
		
	
} else {
	
	header("location:index.php");
	
}

?>