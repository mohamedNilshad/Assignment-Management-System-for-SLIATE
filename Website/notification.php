<?php
 
include_once 'config.php';
include 'validation.php';

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
//echo $url; // Outputs: URI

?>



<html>
<head> 
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
		
		<th width="6%">	
			<div class="navbar">
				<a href="m_main.html">Home</a>
			</div>	
		</th>

		
		<th width="10%">
			<div class="navbar">
				<a href="m_mini.html"> Mini Course</a>
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
			    	

			    	$sql = "SELECT subject.SubName,status,rdate,notify_num FROM notification INNER JOIN subject on notification.sub_id = subject.id WHERE course_id = '$course_id' AND batch ='$b_year' AND type = '$ctype' ORDER BY rdate DESC"  ;
						$result = $conn->query($sql);
						  // output data of each row
					while($row = $result->fetch_assoc()) {
						$cName = $row['SubName'];
						$status = $row['status'];
						$date = $row['rdate'];
						$id = $row['notify_num'];

						if($status == 'unread'){


			    ?>
			      <a href='displayNoti.php?data=<?php echo $id ?>& url=<?php $url ?>'><font color="Black"><?php echo $cName;?><br></font><font size="2px"><i><?php echo $date; ?></i></font></a>

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
			<a href="main.html" id ="log"><font color="white"><font size="3px"><b>LOG OUT</b></font></font></a>	
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



	<h2> Notification </h2>
	
	

</body>

</html>