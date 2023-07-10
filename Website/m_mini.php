<?php
 
include_once 'config.php';
include 'validation.php';

 $reg_number = $_SESSION['reg_num'];

 $sql13 = $conn->query("SELECT id FROM member where reg_num = '$reg_number'");
 $data12 = $sql13->fetch_assoc();
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
//echo $url; // Outputs: URI




	 	$sql = mysqli_query($conn, "SELECT srl_No FROM minicourse ORDER BY srl_No DESC LIMIT 1");

			$SNoM = mysqli_fetch_row($sql);

		$a = 0;
?>
	







<html>
    
	<head> 
		
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />

	<link rel="stylesheet" href="navi.css">
	<link rel="stylesheet" href="mini.css">
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
  
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;

}

li a:hover, .dropdown:hover .dropbtn {
  background-color: gray;
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

    
 <body>
		  
<!--Navigation Bar -->
<table style="width:100%" border="0" collapse="0">
	<tr  style="height:20px">
		<th width="5%" align="left">
			<div class="dropdown">
			  <button class="dropbtn"><img src="images/logo.png" height="20px" width="20px"></button>
			  <div class="dropdown-content">
			    <a href="changepassword.php?data= <?php echo  $data12['id']; ?>" ><font color="#394F8A">Change Password</font></a>
			    <a href="changeEmail.php?data= <?php echo  $data12['id']; ?>"><font color="#394F8A">Change Email</font></a>
			    <a href="index.php"><font color="Blue"><b>Logout</b></font></a>
			  </div>
			</div>
		</th>
		
		<th width="6%">	
			<div class="navbar">
				<a href="m_main.php">Home</a>
			</div>	
		</th>
			
		
		<th width="10%">
			<div class="navbar">
				<a class="active" href="m_mini.php"> Mini Course</a>
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
		


		<th width="15%" align="left">
			<div class="dropdown">
			 <a href="#" style="text-decoration: none;"> Assignment Marks</a>
			  <div class="dropdown-content">
			    <a href="marksMain.php?type= 1" ><font color="#394F8A">Subject Assignment Mark</font></a>
			    <!--<a href="marksMain.php?type= 2" ><font color="#394F8A">Summary of Marks</font></a>-->
			  </div>
			</div>
		</th>





		<th width="7%">
			<div class="navbar">
				<a href="upload.php"> <img src="images/upload_i.png" height="25px" width="25px"></a>
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
		  
		  


<section>
	<div class="container">
<?php	

		$sql = "SELECT DISTINCT srl_No FROM minicourse WHERE deleteNo = '0' ORDER BY srl_No DESC ";
		$result = $conn->query($sql);
		while(($a<$SNoM[0]) && ($row = $result->fetch_assoc())){
			$SNo[0] = $row['srl_No'];


				$sqlN = $conn->query("SELECT Course_Name FROM minicourse where srl_No='$SNo[0]'");
					$data = $sqlN->fetch_assoc();
					
?>
		
					<div class="card">
						<div class="content">
							<div class="imgBx">
								<img src="images/mini.PNG">
							</div>
							<div class="contentBx">
								<h3><?php echo $data['Course_Name'] ?><br><span>KANDY ATI</span></h3>
							</div>
						</div>
						<div class="sci">
							<li>
								<a href='MdCourse.php?data= <?php echo "$SNo[0]"?>' name="start">ENROLL</a>
							</li>
						</div>
					</div>
					
<?php	    	

	      	$a++;
    	}
 ?>
 	</div>
  </section>


			
			
 </body>
</html>