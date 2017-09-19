<?php

	if( (!isset($_COOKIE['c'])) || (!isset($_COOKIE['maxNo'])) ){
		header("Location:playGameA.php");
	}

	session_start();
	$win = false;
	
	//assign a random number to the guessing channel
	//initialize the times of remained chances
	if(!isset($_SESSION["ans"])){
		$_SESSION["ans"] = rand(0,255);
		$_SESSION["chances"] = $_COOKIE['maxNo'];
	} else{
		$_SESSION["chances"] = $_SESSION["chances"] - 1;
	}

	// THE UPPER ONE is w/o G
	// THE LOWER ONE is w/ G
	//initialize the three channels of the background color
	$red = 100;
	$green = 100;
	$blue = 100;
	$Gred = 100;
	$Ggreen = 100;
	$Gblue = 100;
	if($_COOKIE['c'] == "red"){
		$red = $_SESSION["ans"];
		if(isset($_POST['guess'])){
			$Gred = $_POST['guess'];
		}
	} else if($_COOKIE['c'] == "green"){
		$green = $_SESSION["ans"];
		if(isset($_POST['guess'])){
			$Ggreen = $_POST['guess'];
		}
	} else if($_COOKIE['c'] == "blue"){
		$blue = $_SESSION["ans"];
		if(isset($_POST['guess'])){
			$Gblue = $_POST['guess'];
		}
	}	

	//if player does not have chance, then the game cannot continue
	//also the session is over
	if($_SESSION["chances"] == 0){
		$continue = false;
		setcookie("c",NULL);
		setcookie("maxNo",NULL);
		session_destroy();
	} else{
		$continue = true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Guessing game </title>
	<style type="text/css">
		.myButton{
			width:25px;
			height:25px;
			background:<?php echo "rgb(".$red.", ".$green.", ".$blue.")"; ?>;
		}
		.guessButton{
			width:25px;
			height:25px;
			background:<?php echo "rgb(".$Gred.", ".$Ggreen.", ".$Gblue.")"; ?>;
		}
		.warning{
			font-style:italic;
			color:red;
		}
	</style>
	<script type="text/javascript">
	function check(f){
		if(f.guess.value == ""){
			document.getElementById("warning").innerHTML = "<p class=\"warning\">This field is required.</p>";
		} else{
			var guess = parseInt(f.guess.value);
			if( guess >= 0 && guess <= 255 ){
				document.getElementById("warning").innerHTML = "";	
				return true;
			}
			document.getElementById("warning").innerHTML = "<p class=\"warning\">Incorrect format.</p>";
		}
		return false;
	}
	</script>
</head>
<body>
	<h1> Welcome </h1>
	<p> You have chosen the <?php echo $_COOKIE['c']; ?> channel for guessing</p>
	
	<h2> The answer </h2>
	<button id="myButton" class="myButton" ></button>
	
	<form method="post" action="<?php print htmlspecialchars($_SERVER['PHP_SELF'])?>" onsubmit="return check(this)">
		<p>Type your guess here: 
			<input type="text" name="guess" />
			<input type="submit" value="submit"	<?php if (!$continue) { print("disabled=\"disabled\""); } ?>/>
		</p>
		<span id="warning" name="warning"></span>
	</form>
	
	<h2> Your guess: </h2>
	<?php
	if(isset($_POST['guess'])){
		?>
	
		<button id="guessButton" class="guessButton" ></button>
	
		<?php
		if($red == $Gred && $green == $Ggreen && $blue == $Gblue){
			// WIN PART
			//if the player wins
			?>
	
			<p id="win">you win!</p>
	
		<?php
			$continue = false;
			setcookie("c",NULL);
			setcookie("maxNo",NULL);
			session_destroy();
		} else{
			// DO NOT WIN PART
			?>
	
			<p id="notwin"><?php 
			if($red < $Gred || $green < $Ggreen || $blue < $Gblue){
				echo $_POST['guess']." is too big.";
			} else{
				echo $_POST['guess']." is too small.";
			}
			?></p>
	
			<p id="remained">You have <?php echo $_SESSION["chances"]; ?> chances remained.</p>
	
			<?php
			if($_SESSION["chances"] ==0){
				?>
				<p id="ans">You Lost! The correct no is <?php echo $_SESSION["ans"]; ?></p>
			<?php
			}
		}
	} else{
		?>
	
		<p id="maxNo">you have <?php echo $_SESSION["chances"]; ?> chances.</p>
	
		<?php
	}
	?>
</body>
</html>