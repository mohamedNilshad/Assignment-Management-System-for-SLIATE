<?php
include 'validation.php';
$servername = "localhost";
   $username = "root";
   $password = "";
   $database = "project_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

 $reg_number = $_SESSION['reg_num'];


//getting corse and year from reg number
	$myString = "$reg_number";

	$strArray = explode('/',$myString);
	$corse_Name = $strArray[1];
	$b_year = $strArray[2];
	$c_type = $strArray[3];


		if($corse_Name == 'IT'){ $course_id = 4;}
		else if($corse_Name == 'M'){$course_id = 2;}
		else if($corse_Name == 'A'){$course_id = 3;}
		else if($corse_Name == 'BA'){$course_id = 6;}
		else if($corse_Name == 'THM'){$course_id = 5;}
		else if($corse_Name == 'E'){$course_id = 1;}


		if($c_type == 'F'){
			$ctype = "FULL TIME";

		}else{
			$ctype = 'PART TIME';
		}

$url = $_SERVER['REQUEST_URI'];

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
	<head> 
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, address, phone, icons" />
		<link rel="stylesheet" href="navi.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<style>
	#log {
            text-decoration: none;
        }



ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;

}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;

}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 3;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  z-index: 12;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: wight;
  color: white;
}


</style>
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
				<a class="active" href="m_main.php">Home</a>
			</div>	
		</th>
		
		
		<th width="9%">
			<div class="navbar">
				<a href="m_mini.php"> Mini Course</a>
			</div>	
		</th>
		
		<th width="11%">		
			<div class="navbar">
				<a href="ask_the_expert.php"> Ask the Expert </a>
			</div>	
		</th>
		
		<th width="15%">
			<ul>
			  <li class="dropdown">
			  	<?php
			  		$sql = mysqli_query($conn, "SELECT * FROM notification WHERE course_id = '$course_id' AND batch ='$b_year' AND type = '$ctype' AND status = 'unread' ");
						$count = mysqli_num_rows($sql);
			  	?>
			    <a href="javascript:void(0)" class="dropbtn">Notification<span class="w3-badge"><font color="red"><?php echo  $count; ?></font></span></a>
			    <div class="dropdown-content">

			    <?php
			    	
			    	$sql = "SELECT  sub_id, status,rdate,notify_num FROM notification  WHERE course_id = '$course_id' AND batch ='$b_year' AND type = '$ctype' ORDER BY rdate DESC"  ;
						$result = $conn->query($sql);
						  // output data of each row
					while($row = $result->fetch_assoc()) {
						$sId = $row['sub_id'];
						$status = $row['status'];
						$date = $row['rdate'];
						$id = $row['notify_num'];

						$sql1 = $con->query("SELECT SubName FROM subject where id = '$sId'");
			            $data1 = $sql1->fetch_assoc();
	
						$cName = $data1['SubName'];

						if($status == 'unread'){


			    ?>
			      <a href='displayNoti.php?data=<?php echo $id ?>& url=<?php echo $url ?>'><font color="black"><?php echo $cName;?><br></font><font size="2px"><i><?php echo $date; ?></i></font></a>

			      <?php
			  		}else if($status == 'read'){

			      ?>
			     
					<a href='displayNoti.php?data=<?php echo $id ?>& url=<?php echo $url ?>'><font color="gray"><?php echo $cName;?><br><font size="2px"><i><?php echo $date; ?></i></font></font></a>
			     <?php
				  	}
					}
				?>
			    </div>
			  </li>
			</ul>	
		</th>

		<th width="7%">
			<div class="navbar">
				<a href="upload.php"> <img src="images/upload_i.png" height="25px" width="25px"></a>
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