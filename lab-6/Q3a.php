<?php
	$conn = mysqli_connect("localhost", "root", "123456789","examtimetable1");
	if($conn->connect_error){
		echo "Unable to connect to database";
		exit;
	}
	$prog = $_GET["ProgramID"];
	$query = "select ProgramID, SubCode, NoStudents from ProgSubj";
	$result = $conn->query($query);
	print("<h1> " . $prog . "</h1>");
	if(!$result){
		die ("");
	} else{
		$result->data_seek(0);
		$j=0;
		while($row = $result->fetch_assoc())
		{
			if($j == 0){
				$a[$j] = $row["SubCode"];
				$b[$j] = $row["NoStudents"];
				if($row["ProgramID"] == $prog){
					$c[$j] = 1;
				} else{
					$c[$j]=0;
				}
				$j++;
			} else{
				$t=0;
				for($k = 0 ; $k < $j ; $k++){
					if ($a[$k] == $row["SubCode"]){
						$b[$k] += $row["NoStudents"];
						if($row["ProgramID"] == $prog){
							$c[$k] = 1;
						}
						$t=1;
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
		}
		print("<ul>");
		for($i = 0 ; $i < $j ; $i++){
			if($c[$i] == 1){
				print("<li>".$a[$i].": ".$b[$i]."</li>");
			}
		}
		print("</ul>");
	}
	$result->free();
	$conn->close();
?>