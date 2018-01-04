<?php

session_start();

if(isset($_POST['logout']) and !empty($_POST['logout'])) {
				 
				 if(session_destroy()) {
					
					header("Refresh:0; url=index.php");
						
				}
				 
} else {
	
	header("location:index.php");
	
}
		
?>