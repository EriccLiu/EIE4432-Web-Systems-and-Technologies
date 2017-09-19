<!DOCTYPE html>
<html>
<head>
	<title>Answers</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['student_name'])){
	?>
		<p>Please go to <a href="Login.php">Login page</a> first</p>
	<?php
		} else {
			//create the name of the file
			$file_name = (string)$_SESSION['student_name']."_".(string)$_COOKIE['date']."_".(string)$_COOKIE['month']. ".txt";

			if(!file_exists($file_name)){
				//write the answers into a file
				$fp = fopen($file_name,"w");
				fwrite($fp, "question 1: ".$_POST['question1']."\r\n");
				fwrite($fp, "question 2: ".$_POST['question2']."\r\n");
				fwrite($fp, "question 3: ".$_POST['question3']."\r\n");
				fclose($fp);
				
				//print the related information
				echo "<h1>Hello,".$_SESSION['student_name']."</h1>";
				echo "<hr/>";
				echo "<p>You have finished today's exercise.<br/></p>";
				echo "<p>the system will log you out automatically<br/></p>";
			} else {
				//print the related information
				echo "<h1>Hello,".$_SESSION['student_name']."</h1>";
				echo "<hr/>";
				echo "<p>You cannot submit your answer twice.<br/></p>";
				echo "<p>the system will log you out automatically<br/></p>";
			}		
			
		}
		//unset the session to log out
		//unset($_SESSION['school_code']);
		unset($_SESSION['student_name']);
	?>
</body>
</html>