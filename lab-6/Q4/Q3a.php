<?php
	$conn = mysqli_connect("localhost", "root", "123456789","examtimetable1");
	if($conn->connect_error){
		echo "Unable to connect to database";
		exit;
	}
	
	$prog = $_GET["ProgramID"];
	echo "<h1> ".$prog."</h1>";

	$sql = "select ProgramID, SubCode, NoStudents from ProgSubj";
	$result = $conn->query($sql);
	
	if(!$result){
		die ("");
	} else{
		$result->data_seek(0);
		$j = 0;
		while($row = $result->fetch_assoc())
		{
			$t=0;
			for($k = 0 ; $k < $j ; $k++){
				if ($a[$k] == $row["SubCode"]){
					$b[$k] += $row["NoStudents"];
					if($row["ProgramID"] == $prog){
						$c[$k] = 1;
					}
					$t = 1;
				}
			}
			if($t == 0){
				$a[$j] = $row["SubCode"];
				$b[$j] = $row["NoStudents"];
				if($row["ProgramID"] == $prog){
					$c[$j] = 1;
				} else{
					$c[$j]=0;
				}
				$j++;
			}
			
		}
		echo "<ul>";
		for($i = 0 ; $i < $j ; $i++){
			if($c[$i] == 1){
				echo "<li>".$a[$i].": ".$b[$i]."</li>";
				
				$sql = "select SubTitle, EDate, VenueID, StartTime, duration from subject, examdetails where (subject.ExamID = examdetails.ExamID and subject.SubCode=\"".$a[$i]."\")";
				$result = $conn->query($sql);
				if(!$result){
					echo "Wrong with database";
				} else{
					$result->data_seek(0);
					$row = $result->fetch_assoc();
					echo "The examination of ".$row["SubTitle"]." is on ".$row["EDate"]." at ".$row["VenueID"].". It will start at ".$row["StartTime"].". Its duartion is ".$row["duration"]."hrs.";
				}
			}
		}
		echo "</ul>";
	}
	$result->free();
	$conn->close();
?>