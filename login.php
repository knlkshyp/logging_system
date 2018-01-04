<?php 

session_start();

require_once 'conf.php';

if(isset($_POST['login']) and !empty($_POST['login'])) {
		
		$u_name = htmlentities($_POST['u_name']);
		$pwd = htmlentities($_POST['pwd']);	
	
		if(isset($u_name) and isset($pwd)) {
			
			$query = "select * from users 
					where Username = '$u_name'"; 
					
			$result = mysqli_query($con,$query);
			
			$row = mysqli_fetch_assoc($result);
			
			$u_name_db = $row['Username'];
			$pwd_db = $row['Password'];
			
			mysqli_close($con);
			
			if($u_name == $u_name_db and $pwd == $pwd_db) {
					
					$_SESSION['u_name'] = $u_name;
					header("location:profile.php");
					
			}else {
		
				header("location:index.php");
	
			}
			
		} else {
		
			header("location:index.php");
	
			}
			
} else {
		
	header("location:index.php");
	
	}

?>