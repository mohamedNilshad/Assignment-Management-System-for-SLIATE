<?php

$servername = "localhost";
   $username = "root";
   $password = "";
   $database = "project_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

 

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


	$_pNo = $_GET['data']; 
          
	//$sql = "SELECT * FROM minicourse where 	srl_No = '".$_SESSION['email']."' ";
   	$sql = "SELECT member.name, course.CoursrsName,subject.SubName,Topic,files FROM project INNER JOIN member on project.member_id= member.id INNER JOIN subject on project.sub_id= subject.id  INNER JOIN course on project.course_id= course.id WHERE pNo = $_pNo";
	$result = $conn->query($sql);
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  	 $Name = $row['name'];
	  	 $cName = $row['CoursrsName'];
	     $subNum = $row['SubName'];
	  	 $topic= $row['Topic'];
	  	 $file= $row['files'];
	
	  
	}
?>

<!DOCTYPE html>
<html>
	<head> 
		<link rel="stylesheet" href="navi.css">
		<link rel="stylesheet" href="mini.css">
		<!--<head> <link rel="stylesheet" href="style8.css"></head> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body>


<!--Navigation Bar -->
<table style="width:100%"  collapse="1">
	<tr  style="height:20px">
		<th  width="1%">
		</th>
		<th  width="5%" align="left">
			<img src="images/logo.png" height="40px" width="40px"></a>
		</th>
		
		<th>	
			<div class="navbar">
				<a class="active" href="index.php">Home</a>
			</div>	
		</th>
		
		<th>
			<div class="navbar">
				<a href="newSignin.html">Student</a>
			</div>	
		</th>
		
		<th>
			<div class="navbar">
				<a href="admin.html">Lecturer</a>
			</div>	
		</th>
		
		<th width="10%">
			<div class="navbar">
				<a href="mini.php"> Mini Course</a>
			</div>	
		</th>
		

		
		<th>
			
			<div class="topnav">
				<div class="search-container">
					<form action="#">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit"><i>search</i></button>
					</form>
				</div>
			</div>
			
		</th>
	</tr>
</table>
  

<br><br>
	<font size="5px">
		<table  width="100%">

	
			<tr style="background-color:Olive;">
				<td><font color="gray">Topic</font></td>
				<td><font color="gray">:</font></td>
				<td><?php echo $topic;?></td>
			</tr>

			<tr>
				<td><font color="gray">Course</font></td>
				<td><font color="gray">:</font></td>
				<td><?php echo $cName;?></td>

			</tr>
			<tr>
				
				<td><font color="gray">Subject</font></td>
				<td><font color="gray">:</font></td>
				<td><?php echo $subNum;?></td>

			</tr>
			<tr>
				
				<td><font color="gray">Done By</font></td>
				<td><font color="gray">:</font></td>
				<td><?php echo $Name ;?></td>

			</tr>
			<tr>
				<td><font color="gray">File</font></td>
				<td><font color="gray">:</font></td>
				<td><?php echo $file ;?></td>
				<td><a href="downloadFile.php?file=<?php echo $file ?>"><button class="btn"><i class="fa fa-download fa-1x" > </i> Download</button></a></td></td>


			</tr>

		</table>
</font>




		
</body>
</html>