<?php

session_start();

require_once 'conf.php';

if(isset($_POST['signup']) and !empty($_POST['signup'])) {
		
		if(isset($_POST['name']) and isset($_POST['email'])
			and isset($_POST['pwd']) and isset($_POST['u_name'])) {
			
			$name = htmlentities($_POST['name']);
			$email = htmlentities($_POST['email']);
			$pwd = htmlentities($_POST['pwd']);
			$u_name = htmlentities($_POST['u_name']);

			if(isset($name) and isset($email) and isset($pwd) and isset($u_name)) {
						
				$return = "select * from users where Username = '$u_name'
								or Email = '$email'";
								
				$result = mysqli_query($con,$return);
				$num = mysqli_num_rows($result);
		
				if($num == 0) {
							
					$query = "insert into users (Name,Email,Password,Username) 
							values ('$name','$email','$pwd','$u_name')";
				
					mysqli_query($con,$query);
							
					$return = "select * from users where Username = '$u_name'
								and Password = '$pwd'";
								
					$result = mysqli_query($con,$return);
					$row = mysqli_fetch_assoc($result);
					
					$u_name_db = $row['Username'];
					$pwd_db = $row['Password'];
					mysqli_close($con);
					
					if($u_name == $u_name_db and $pwd == $pwd_db) {
						
						$_SESSION['u_name'] = $u_name;
						header("location:profile.php");
						
					} else {
							
						header("location:index.php");	
						
						}
			
							
				} else {
							
					header("location:index.php");	
					}
							
			}		
					
		} else {
					
			header("location:index.php");
			}
				
} else {
					
	header("location:index.php");		
	}

?>