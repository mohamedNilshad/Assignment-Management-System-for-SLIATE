<?php

	include 'admin_login.php';

   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "project_management";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$database);

		$email = $_SESSION['email'];

		$sql2 = $con->query("SELECT id FROM admin WHERE email = '$email'");
		$data2 = $sql2->fetch_assoc();									
		$Admin_id= $data2['id'];
		//echo $Admin_id, " = ";

	 	$sql = mysqli_query($conn, "SELECT id FROM replies WHERE show_comment = '1' AND delete_id = '$Admin_id'");
		$Num_row = mysqli_num_rows($sql);
		//echo $Num_row;
		$r = 0;



		//restore
		if(isset($_POST["restore"])){

			$CId = $_POST['restore']; 
			//echo $SId ;
			$sql= "UPDATE replies SET show_comment ='0' WHERE id = '$CId'";
				if (mysqli_query($conn, $sql)) {
					echo '<script>alert("Comment Restored!")</script>';
				} else {
				  echo "Error in Deleting record: " . $conn->error;
				}
		}
			//restore
		if(isset($_POST["delete"])){

			$CId = $_POST['delete']; 
			//echo $SId ;
			$sql= "DELETE FROM replies WHERE id = '$CId'";
			  
				if (mysqli_query($conn, $sql)) {
					echo '<script>alert(" Comment Deleted!")</script>';
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
	  background-color: #d99266;
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
<pre> <h2><a href="AdminRecycleBin.php" style="text-decoration:none"><font color="#1A2238" face="Calibri"> [MiniCourse]</font></a> <a href="comment_bin.php" style="text-decoration:none">	<font color="#3f63a1" face="Calibri"> [Comments]</font></a></a> <a href="replay_bin.php" style="text-decoration:none">	<font color="#2568FB" face="Calibri"> [Replay]</font></a></h2><hr></pre>
	
<br>
<CENTER>
		<table width="95%">
			<tr>
				<th width="8%">Commenter</th>
				<th>Replay</th>
				<th width="10%">Created Date</th>
				<th width="10%">Deleted Date</th>
				<th width="10%">Restore</th>
				<th width="10%">Delete</th>
			</tr>

<?php

		$sql = "SELECT id FROM  replies WHERE show_comment = '1' AND delete_id = '$Admin_id' ORDER BY deleted_date DESC ";
		$result = $conn->query($sql);
		while(($r<$Num_row) && ($row = $result->fetch_assoc())){
			$rNo[0] = $row['id'];
	
			$sqlN = $conn->query("SELECT replies.id, name, comment,createdOn,deleted_date FROM replies INNER JOIN member ON replies.memberId = member.id WHERE replies.id  = '$rNo[0]' ");
					$data = $sqlN->fetch_assoc();

			

?>
			<tr>
				<td><?php  echo $data['name'] ?></td>
				<td><?php  echo $data['comment'] ?></td>
				<td><?php  echo $data['createdOn'] ?></td>
				<td><?php  echo $data['deleted_date'] ?></td>
				<form action="comment_bin.php" method="POST">

					<td><button class="button button2" type="submit" name="restore" value="<?php echo $data['id'] ?>">Restore</button></td>
					<td><button class="button button3" type="submit" name="delete" value="<?php echo $data['id'] ?>">Delete</button></td>
				</form>
			</tr>

			<?php

			$r++;
		}

?>
		</table>


</CENTER>



<br>
<a href="a_main.php"><button> <<< Click Back To main Page</button></a>

</body>
</html>