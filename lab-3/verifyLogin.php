<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		warning{
			color:red;
			font-style:italic;
		}
	</style>
	<script type="text/javascript">
		function check(f){
			var finished = true;
			if(f.question1.value == ""){
				document.getElementById("Q1").innerHTML = "<warning>&nbsp;&nbsp;this answer is required</warning>";
				finished = false;
			} else {
				document.getElementById("Q1").innerHTML = "";
			}	
			
			if(f.question2.value == ""){
				document.getElementById("Q2").innerHTML = "<warning>&nbsp;&nbsp;this answer is required</warning>";
				finished = false;
			} else {
				document.getElementById("Q2").innerHTML = "";
			}
			
			if(f.question3.value == ""){
				document.getElementById("Q3").innerHTML = "<warning>&nbsp;&nbsp;this answer is required</warning>";
				finished = false;
			} else {
				document.getElementById("Q3").innerHTML = "";
			}
			
			return finished;
		}
	</script>
</head>
<body>
	<!-- verify if the user can access to the system -->
	<?php
		session_start();

		$legal = false;
		if(isset($_SESSION['student_name'])){
			$student_name = $_SESSION['student_name'];
			$legal = true;
		} else if(isset($_POST['school']) && isset($_POST['student']) && isset($_POST['password'])){
			//get the value by post method
			$school_code = $_POST['school'];
			$student_name = $_POST['student'];
			$pwd = $_POST['password'];
			
			//verify with file
			$verify_fp = fopen("test.txt","r");
			
			//use while loop to check with each line of file
			while(!feof($verify_fp)){
				$pair = fgets($verify_fp);
				//use ',' split each line
				$splited_pair = explode(',',$pair);
				$school = $splited_pair[0];
				$student = $splited_pair[1];
				$password = $splited_pair[2];
				
				//if there is one line match the inputs, then the user is legal
				//also save school code, student name and password as session data
				if( $school_code == $school && $student_name == $student && $pwd == $password ){
					$legal = true;
					//$_SESSION['school_code'] = $school_code;
					$_SESSION['student_name'] = $student_name;
					//$_SESSION['pwd'] = $pwd;
					break;
				}
			}
			fclose($verify_fp);
		}
		if(!$legal){
		//if not verified, the page is as follow
	?>
	<h1>Access Denied</h1>
	<p>Incorrect username/password.<p>
	<?php
		} else {
			if(!$_COOKIE['studentName']){
				setcookie("studentName",$student_name);
			}
			setcookie("date",date("d"));
			setcookie("month",date("m"));
			echo "<h1>Welcome,".$student_name."</h1>";
	?>
		<hr/>
		<form name="questionnaire" id="questionnaire" action="answers.php" method="post" onsubmit="return check(this)">
			<h2>Article to be read</h2>
			<p>I am Mary Low. I am six years old. My english teacher is Miss Chan. I have a new friend. His name is John.<br/></p>
			
			<p>Question 1. What is the name of the girl?<span id="Q1"></span><br/>
				<input name="question1" type="radio" value="Mary"/>Mary<br/>
				<input name="question1" type="radio" value="John"/>John<br/>
				<input name="question1" type="radio" value="Miss Chan"/>Miss Chan<br/>
				<br/>
			</p>
			
			<p>Question 2. How old is Mary?<span id="Q2"></span><br/>
				<input name="question2" type="radio" value="Five"/>Five<br/>
				<input name="question2" type="radio" value="Six"/>Six<br/>
				<input name="question2" type="radio" value="Seven"/>Seven<br/>
				<br/>
			</p>
			
			<p>Question 3. What is the name of Mary's new friend?<span id="Q3"></span><br/>
				<input name="question3" type="radio" value="Mary"/>Mary<br/>
				<input name="question3" type="radio" value="John"/>John<br/>
				<input name="question3" type="radio" value="Miss Chan"/>Miss Chan<br/>
				<br/>
			</p>
			
			<input type="submit" name="Qsubmit" value="Hand in your answer" width="100" style="width:200px"/>
		</form>
	<?php
		}
	?>
	
</body>
</html>