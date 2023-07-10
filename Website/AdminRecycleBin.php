<?php

	include 'admin_login.php';

   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "project_management";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$database);

		$email = $_SESSION['email'];

		$sql2 = $con->query("SELECT id FROM admin where email = '$email'");
		$data2 = $sql2->fetch_assoc();									
		$Admin_id= $data2['id'];
		//echo $Admin_id, " = ";

	 	$sql = mysqli_query($conn, "SELECT DISTINCT srl_No FROM minicourse WHERE Admin_ID = '$Admin_id' AND deleteNo = '1'");
		$Num_row = mysqli_num_rows($sql);
		//echo $Num_row;
		$a = 0;



		//restore
		if(isset($_POST["restore"])){

			$SId = $_POST['restore']; 
			//echo $SId ;
			$sql= "UPDATE minicourse SET deleteNo ='0' WHERE srl_No = '$SId'";
				if (mysqli_query($conn, $sql)) {
					echo '<script>alert("Restored!")</script>';
				} else {
				  echo "Error in Deleting record: " . $conn->error;
				}
		}
			//restore
		if(isset($_POST["delete"])){

			$SId = $_POST['delete']; 
			//echo $SId ;
			$sql= "DELETE FROM minicourse WHERE srl_No = '$SId'";
			  
				if (mysqli_query($conn, $sql)) {
					echo '<script>alert("deleted!")</script>';
				} else {
				  echo "Error in Deleting record: " . $conn->error;
				}
		}



?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<style>
	table, th, td {
	border: 1px solid white;
	  border-collapse: collapse;
	   text-align: center;
	}

	th, td {
	  background-color: #96D4D4;
	  text-align: center;
	
	}



.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 2px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}




.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}


</style>



<body>
<pre> <h2><a href="AdminRecycleBin.php" style="text-decoration:none"><font color="#2568FB" face="Calibri"> [MiniCourse]</font></a> <a href="comment_bin.php" style="text-decoration:none">	<font color="#1A2238" face="Calibri"> [Comments]</font></a></h2><hr></pre>
	
<br>
<CENTER>
		<table width="95%">
			<tr>
				<th width="10%">Course ID</th>
				<th>Course Name</th>
				<th>Course Description</th>
				<th width="10%">Restore</th>
				<th width="10%">Delete</th>
			</tr>

<?php

		$sql = "SELECT DISTINCT srl_No FROM minicourse WHERE Admin_ID = '$Admin_id' AND deleteNo = '1' ORDER BY srl_No DESC ";
		$result = $conn->query($sql);
		while(($a<$Num_row) && ($row = $result->fetch_assoc())){
			$SNo[0] = $row['srl_No'];
	
				$sqlN = $conn->query("SELECT DISTINCT srl_No, Course_Name, description FROM minicourse WHERE srl_No = '$SNo[0]' ");
					$data = $sqlN->fetch_assoc();

?>
			<tr>
				<td><?php  echo $data['srl_No'] ?></td>
				<td><?php  echo $data['Course_Name'] ?></td>
				<td><?php  echo $data['description'] ?></td>
				<form action="AdminRecycleBin.php" method="POST">
					<!--<td><a href="AdminRecycleBin.php?data=<?php echo $data['srl_No'] ?>"><button class="button button2" type="submit" name="restore">Restore</button></a></td>-->

					<td><button class="button button2" type="submit" name="restore" value="<?php echo $data['srl_No'] ?>">Restore</button></td>
					<td><button class="button button3" type="submit" name="delete" value="<?php echo $data['srl_No'] ?>">Delete</button></td>
				</form>
			</tr>

			<?php

			$a++;
		}

?>
		</table>


</CENTER>



<br>
<a href="a_main.php"><button> <<< Click Back To main Page</button></a>

</body>
</html>