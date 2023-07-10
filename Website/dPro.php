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
	<title></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />


	<link rel="stylesheet" href="navi.css">
</head>
<body>
<!--Navigation Bar -->
<table style="width:100%" border="0" collapse="0">
	<tr  style="height:20px">
		<th  width="1%">
		</th>
		<th  width="5%" align="left">
			<img src="images/logo.png" height="40px" width="40px"></a>
		</th>
		
		<th width="6">	
			<div class="navbar">
				<a class="active" href="a_main.php">Home</a>
			</div>	
		</th>
		
		
		<th width="9%">
			<div class="navbar">
				<a href="a_mini.php"> Mini Course</a>
			</div>	
		</th>
		
		<th width="11%">		
			<div class="navbar">
				<a href="ask_the_expert_admin.php"> Ask the Expert </a>
			</div>	
		</th>
		
		<th width="5%">
			<div class="navbar">
				<a href="inbox.php" class="notification">
					<span><img src="images/inbox.png" height="25px" width="25px"></span>
					<span class="badge">0</span>
				</a>
			</div>	
		</th>
		
		<th width="7%">
			<div class="navbar">
				<a href="Miniupload.php"> <img src="images/upload_i.png" height="25px" width="25px"></a>
			</div>	
		</th>
		
		<th width="7.1%" style="background-color:#2568FB;">	
			<div class="navbar">
				<a href="D:\0. Sliate\Assinments\2nd sem\Human\parted\commen user\main.html"><font color="white"><b>LOG OUT</b></font></a>
			</div>	
		</th>
		
		
		
		
		<th >
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