<?php
	include 'validation.php';
   //include 'Miniupload.php';
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
else{


	$_SNo = $_GET['data']; 
          
	//$sql = "SELECT * FROM minicourse where 	srl_No = '".$_SESSION['email']."' ";
   	$sql = "SELECT Course_Name, admin.Name, srl_No,description , admin.email FROM minicourse INNER JOIN admin on minicourse.Admin_ID= admin.id where srl_No = $_SNo ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  	$cName = $row['Course_Name'];
	  	$aName = $row['Name'];
	  	$cNo = $row['srl_No'];
	  	$description= $row['description'];
	  	$L_email = $row['email'];
	  }
	}




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
			$ctype = "FULL";

		}else{
			$ctype = 'PART';
		}

$url = $_SERVER['REQUEST_URI'];


	
}
?>



<html>
    <head>

    	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, address, phone, icons" />
		
      <link rel="stylesheet" href="navi.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>


    <style>
    	
    .vertical-center {
	  margin: 0;
	  position: absolute;
	  left: 82%;
	  -ms-transform: translateY(-50%);
	  transform: translateY(-50%);
	  color : red;
	}

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
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
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


	
		input[type=submit] {
	  width: 5%;
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	  left: 50%;
	}

	input[type=submit]:hover {
	  background-color: #45a049;
	}





</style>

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
				<a href="m_main.php">Home</a>
			</div>	
		</th>
		
		
		<th width="9%">
			<div class="navbar">
				<a class="active" href="m_mini.php"> Mini Course</a>
			</div>	
		</th>
		
		<th width="11%">		
			<div class="navbar">
				<a href="ask_the_expert.php"> Ask the Expert </a>
			</div>	
		</th>
		
		<th width="13%">
			<ul>
			  <li class="dropdown">
			  	<?php
			  		$sql = mysqli_query($conn, "SELECT * FROM notification WHERE course_id = '$course_id' AND batch ='$b_year' AND type = '$ctype' AND status = 'unread' ");
						$count = mysqli_num_rows($sql);
			  	?>
			    <a href="javascript:void(0)" class="dropbtn">Notification<span class="w3-badge"><font color="red"><?php echo  $count; ?></font></span></a>
			    <div class="dropdown-content">

			    <?php
			    	

			    	$sql = "SELECT course.CoursrsName,status,rdate,notify_num FROM notification INNER JOIN course on notification.course_id = course.id WHERE course_id = '$course_id' AND batch ='$b_year' AND type = '$ctype' ORDER BY rdate DESC"  ;
						$result = $conn->query($sql);
						  // output data of each row
					while($row = $result->fetch_assoc()) {
						$cName = $row['CoursrsName'];
						$status = $row['status'];
						$date = $row['rdate'];
						$id = $row['notify_num'];

						if($status == 'unread'){


			    ?>
			     <a href='displayNoti.php?data=<?php echo $id ?>& url=<?php echo $url ?>'><font color="gray"><?php echo $cName;?><br></font><font size="2px"><i><?php echo $date; ?></i></font></a>

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
				<a href="Miniupload.php"> <img src="images/upload_i.png" height="25px" width="25px"></a>
			</div>	
		</th>
		
		<th width="7.2%" style="background-color:#2568FB;">	
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
		<!--<a href="thumb.php" style="text-decoration: none"><button>Change Thumbnail</button></a><br>

	<form action="thumb.php" method="post">
		<b> Change Thumbnail  : </b> <input type="file" name="my_image">
		 <input type="submit" name="submit" value="Upload">   
	</form>
-->
 	<form action="dCourse.php" method = "POST">

		<table border="0px" >
			<tr>
				<td><font color = "gray"><b> Course Name</b></font></td>
				<td><font color = "gray"><b> : </b></font></td>
				<td> <?php echo $cName; ?> </td>

			</tr>
			
			<tr>
				<td><font color = "gray"><b> Uploader</b></font></td>
				<td><font color = "gray"><b> : </b></font></td>
				<td> <?php echo $aName; ?> </td>
			</tr>

			<tr>
				<td><font color = "gray"><b> Course No</b></font></td>
				<td><font color = "gray"><b> : </b></font></td>
				<td> <?php echo $cNo; ?> </td>
			</tr>

			<tr>
				<td><font color = "gray"><b>Description</b></font></td>
				<td><font color = "gray"><b> : </b></font></td>
				<td> <?php echo $description; ?> </td>
			</tr>

			
		</table>

	<!--<a href="thumb.php"> 	
		<b> Change Thumbnail  : </b><input type="file" name="thumb" required="">
		 <input type="submit" name="thumb-submit" value="Upload">
	</a>-->
		<hr size = "3px" color="#1A2238"> <br>

	<!--<button type="submit" name="show"><b>Click here to Start</b></button>-->

	<br>

	<?php 
		//if(isset($_POST['show'])){
		$sql = "SELECT myfile FROM minicourse where srl_No = $_SNo ";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) { 
		  	$cVideo= $row['myfile'];


	?>
			<video width="320" height="240" controls>
	  			<source src="course/<?php echo $row['myfile']; ?>" type="video/mp4">
	 			 Your browser does not support the video tag.
			</video>
			
	<?php
		  }
		} 
	//}


	?>

	
</form>

	
  		<form action="doQuizM.php" method="POST">
			<input type="hidden" name="miniCourse_id" value="<?php echo $cNo; ?>">
			<input type="submit" name="Do_Question" value="QUIZ">
		</form>
	

 </body>
</html>    
