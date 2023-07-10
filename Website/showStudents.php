<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="project_management";

  	$conn = mysqli_connect($servername, $username, $password,$db);

   	if(isset($_POST['remove'])){

   		$id = $_POST['R_id']; 

   	$sql1= "UPDATE member SET block = 1 WHERE id = '$id'";
		if (mysqli_query($conn, $sql1)) { }
	}

	if(isset($_POST['add'])){

   	$id = $_POST['A_id']; 

   	$sql1= "UPDATE member SET block = 0 WHERE id = '$id'";
		if (mysqli_query($conn, $sql1)) { }
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Lecturer Details</title>
</head>

<style>


	
		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
		  background-color: #1F3044;
		  color: white;
		}
</style>

<body>

	<a href="editor_home.php"> <button name="show" class="btn-4">Go to Home</button> </a> <br><br>


	<table border="1px">
		<tr>
			<th>ID</th>
			<th>Full Name</th>
			<th>Reg. Number</th>
			<th>Course</th>
			<th>Batch</th>
			<th>Type</th>
			<th>email</th>
			<th>Remove</th>
			<th>Add</th>
			<th>Status</th>

		</tr>
		<?php 
			$sql = "SELECT id, name, reg_num, course_id, batch, Type, email, block FROM member WHERE id != '0' ORDER BY id DESC ";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
				 $Id= $row['id'];
				 $fName= $row['name'];

				 $regNum= $row['reg_num'];
				 $cId= $row['course_id'];
				 $batch= $row['batch'];
				 $type= $row['Type'];
				 $email = $row['email'];
				 $status = $row['block'];


				 if($cId == '1'){ $cName = "HNDE"; }
				 else if($cId == '2') {$cName = "HNDM";}
				 else if($cId == '3') {$cName = "HNDA";}
				 else if($cId == '4') {$cName = "HNDIT";}
				 else if($cId == '5') {$cName = "HNDTHM";}
				 else if($cId == '6') {$cName = "HNDBA";}


		?>
		<tr>
			<td> <?php echo $Id; ?> </td>
			<td> <?php echo $fName; ?> </td>
			<td> <?php echo $regNum; ?> </td>
			<td> <?php echo $cName; ?> </td>
			<td> <?php echo $batch; ?> </td>
			<td> <?php echo  $type; ?> </td>
			<td> <?php echo $email; ?> </td>

			<td> <form action="showStudents.php" method="POST"> <input type="hidden" name="R_id" value="<?php echo $Id; ?>"> <input type="submit" name="remove" value="Remove"> </form> </td>
			<td> <form action="showStudents.php" method="POST"> <input type="hidden" name="A_id" value="<?php echo $Id; ?>"> <input type="submit" name="add" value="Add"> </form></td>
			<?php if($status == '0'){ ?>
				<td width = "50px"> block </td>
			<?php } else {?> 
				<td width = "50px"> Unblock </td>


		</tr>

			<?php
					}
				}

			?>
	</table>
</body>
</html>