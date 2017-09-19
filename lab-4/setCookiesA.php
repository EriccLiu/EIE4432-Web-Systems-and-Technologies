<?php
	setcookie("c",$_GET['itemChosen'],time() + 365*24*60*60);
	setcookie("maxNo",$_GET['noGuess'],time() + 365*24*60*60);
	header("Location:GuessingA.php");
?>