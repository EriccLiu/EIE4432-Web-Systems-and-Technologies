<?php
	function swap(&$a, &$b){
		$c = $a;
		$a = $b;
		$b = $c;
	}
	//bubble sort
	function array_sort(&$list){
		for( $i = 0 ; $i < count($list) ; $i++ ){
			for( $j = 0 ; $j < count($list) - $i - 1; $j++ ){
				if(strcasecmp($list[$j], $list[$j+1]) > 0){
					swap($list[$j], $list[$j+1]);
				}
			}
		}
	}
	
	$hostname = "localhost:3306";
	$username = "root";
	$pwd = "123456789";
	$db = "statworld";
	
	$conn = mysqli_connect($hostname,$username,$pwd,$db);
	
	//Query the result set from database
	$sql = "select * from `countryList` where `continent`=\"".$_GET['Continent']."\"";
	$result = $conn->query($sql);
	
	$list = array();
	while($row = $result->fetch_assoc()){
		$list[] = $row['name'];
	}
	array_sort($list);
	
	echo  "<h1 class=\"head\">List of countries in ".$_GET['Continent']."</h1>";		
	if(count($list) == 0){
		echo "<h3>No record</h3>";
	} else{
		echo "<ul id=\"countryList\">";
		for( $i = 0 ; $i < count($list) ; $i++){
			echo "<li>".$list[$i]."</li>";
		}
		echo "</ul>";
	}
	
	$conn->close();
?>