<!DOCTYPE html>
<html>
<head>
	<title> Lab 6 </title>
	<script type="text/javascript">
		function show(){
			xmlHTTP = null;
			if(window.XMLHttpRequest){
				xmlHTTP = new XMLHttpRequest();
			} else if(window.ActiveXObject){
				xmlHTTP = new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			$url = "Q3a.php?ProgramID="+document.myform.program.value;			
			if(xmlHTTP != null){
				xmlHTTP.onreadystatechange = stateChange;
				xmlHTTP.open("GET",$url,true);
				xmlHTTP.send(null);
			} else{
				alert("Your browser does not support XML.");
			}
		}
		
		function stateChange(){
			if( (xmlHTTP.readyState == 4) && (xmlHTTP.status == 200) ){
				document.getElementById("info").innerHTML = xmlHTTP.responseText;
			}
		}
	</script>
</head>
<body>
	<form name="myform" method="GET" action="Q1a.php">
		<p> Select the Program:
			<select name="program">
			<?php
			
				$conn = mysqli_connect("localhost", "root", "123456789","examtimetable1");
				if ($conn->connect_error){
					echo "Unable to connect to database";
					exit;
				}
				
				$sql = "select ProgramID from Programme";
				$result = $conn->query($sql);
								
				$result->data_seek(0);
				while ($row = $result->fetch_assoc()){
					echo "<option value='".$row["ProgramID"]."'>".$row["ProgramID"]."</option>";
				}
				
				$result->free();
				$conn->close();
			?>
			</select>
		</p>
		<p>
			<input type="button" value="show" onclick="show()" />
		</p>
	</form>
	<div name="info" id="info"></div>
</body>
</html>
