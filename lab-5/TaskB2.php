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
	$sql = "select name from `countryList` where `continent`=\"".$_GET['Continent']."\"";
	$result = $conn->query($sql);
	
	//Put all the countries in the list and sort them
	$list = array();
	while($row = $result->fetch_assoc()){
		$list[] = $row['name'];
	}
	array_sort($list);
	
	//show the info of head
	echo "<h1 class=\"head\">Countries and Spoken languages in ".$_GET['Continent'];
	echo "&nbsp;&nbsp;&nbsp;&nbsp;<button id=\"changeStyle\" name=\"changeStyle\" class=\"changeStyle\" onclick=\"changeStyle()\">change style</button></h1>";
	if(count($list) == 0){
		//if there is no result, show no record
		echo "<h3>No record</h3>";
	} else{
		//else show the country list as unordered list
		echo "<ul id=\"countryList\" value=\"0\">";
		for( $i = 0 ; $i < count($list) ; $i++){
			echo "<li>".$list[$i]."<ul>";
			
			//get all the languages spoken by the i th country
			$sql = "select language,offical from `country_language` where id in (select id from `countryList` where `name`=\"".$list[$i]."\")";
			$result = $conn->query($sql);
			//put them in an array and sort them
			$language_list = array();
			while($row = $result->fetch_assoc()){
				array_push($language_list,array($row['language'], $row['offical']));
			}
			sort($language_list);
			
			//show information as sublist
			for( $j = 0 ; $j < count($language_list) ; $j++){
				if($language_list[$j][1] == 1){
					echo "<li>".$language_list[$j][0].", T</li>";
				} else{
					echo "<li>".$language_list[$j][0].", F</li>";
				}
			}
			echo "</ul></li>";
		}
		echo "</ul>";
	}
	
	$conn->close();
?>