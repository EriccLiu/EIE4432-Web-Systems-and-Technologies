<!DOCTYPE html>
<html>
<head>
	<title>check index</title>
	<?php
		//check if the browser has visited the php file
		//use cookie 'visit'
		//the expired time is set as 10 min
		if($_COOKIE['visit']){
			
			setcookie("visit",$_COOKIE['visit']+1,time()+60*10);
			
			//if visited, redirect to login.html
			header("Location:/EIE4432-lab3/login.html");
		} else {
			
			setcookie("visit",1,time()+60*10);
			
			//if not visited, redirect to objectives.html
			header("Location:/EIE4432-lab3/objectives.html");
		}
	?>
</head>
</html>