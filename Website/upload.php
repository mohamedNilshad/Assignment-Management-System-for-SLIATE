<?php

include 'validation.php';
$conn = new mysqli('localhost', 'root', '', 'project_management');

$memberId = $_SESSION['userId'];
$reg_num = $_SESSION['reg_num'];


 $sql12 = $con->query("SELECT id FROM member where reg_num = '$reg_num'");
 $data12 = $sql12->fetch_assoc();

$myString = "$reg_num";

$strArray = explode('/',$myString);
$course_type = $strArray[3];
$type = "";
//echo $course_type;
if($course_type == 'F'){
	$type = "FULL TIME";
}
else if($course_type == 'P'){
	$type = "PART TIME";
}

date_default_timezone_set('Asia/Kolkata');
$date = date('y-m-d h:i:s');
//echo $date;


$sql = $conn->query("SELECT course_id FROM member WHERE id = '$memberId'");
					$data = $sql->fetch_assoc();

					$courseID = $data['course_id'];

	//echo $courseID;

if(isset($_POST["submit"]))
{
    //$memberId = $_SESSION['userId'];


    
    $subId = $_POST['subcode'];
    $adminId = $_POST['lecture'];
    $topic = $_POST['topic'];
    $Asign_code = $_POST['as_code'];

    

	$c= 1;

			$sql2 = mysqli_query($conn, "SELECT pNo FROM project ORDER BY pNo DESC LIMIT 1");
			$project_No = mysqli_fetch_row($sql2);

			$project_No= $project_No[0] + $c;


		   
			$a= 1;
		    	$tmpFilePath = $_FILES['file']['tmp_name'];

		    	if ($tmpFilePath != ""){
				    //Setup our new file path
				    $newFilePath = "./proj/" . $_FILES['file']['name'];

				    //Upload the file into the temp dir
	    			move_uploaded_file($tmpFilePath, $newFilePath);
			        	$filename = $_FILES['file']['name'];
			       }

		

    $sql="INSERT INTO project (member_id,course_id,sub_id,admin_id,course_type,Topic,pNo,project_code,uploadDate,Files)VALUES('$memberId','$courseID','$subId','$adminId','$type','$topic','$project_No','$Asign_code' ,'$date','$filename')";

    if(mysqli_query($conn,$sql)){
    	echo "uploaded";
    }
    else
    	echo "not uploaded";
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
			$ctype = "FULL TIME";

		}else{
			$ctype = 'PART TIME';
		}

$url = $_SERVER['REQUEST_URI'];




?>



<html>
	<head> 
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, address, phone, icons" />


		<link rel="stylesheet" href="navi.css">
		<link rel="stylesheet" href="up.css">	
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		
	</head>
<style>
	#log {
            text-decoration: none;
        }

.button {
  display: inline-block;
  border-radius: 10px;
  background-color: #1D2228;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
 
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: 20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 15px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
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
		

    <th width="15%" align="left">
            <div class="dropdown">
             <a href="#" style="text-decoration: none;"><font color="black"> Assignment Marks</font></a>
              <div class="dropdown-content">
                <a href="marksMain.php?type= 1" ><font color="#394F8A">Subject Assignment Mark</font></a>
                <!--<a href="marksMain.php?type= 2" ><font color="#394F8A">Summary of Marks</font></a>-->
              </div>
            </div>
     </th>
    


		<th width="7%">
			<div class="navbar">
				<a class="active" href="upload.php"> <img src="images/upload_i.png" height="25px" width="25px"></a>
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







<!-- From -->

<div class="login-box">
  <h2>Upload Your Project Files Here</h2>

  <form action="upload.php" method="post" name="upload"  enctype="multipart/form-data">
    
 
	<div class="user-box">
      <input type="text" name="topic" required="">
      <label>Topic</label>
    </div>

<select class="minimal" name="subcode" required="">
  <option value="" disabled selected hidden>Subject</option>
  <?php 
	$sql = "SELECT id, SubName FROM subject WHERE course_Id='$courseID'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  	$subCode = $row['id'];
	  	$courseName = $row['SubName'];	
	  	//$CorId = $row['id'];	
?>
<?phph echo $course;  ?> 
    <option value="<?php echo "$subCode"; ?>"><?php echo "$courseName"; ?></option>
<?php  
   
		}
	}
?>
  
</select>
	
<br><br>


<select class="minimal" name="lecture" required="">
  <option value="" disabled selected hidden>Subject Lecturer</option>
  <?php 
	$sql = "SELECT id, Name FROM admin ";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	  	$Lecturer_Id = $row['id'];
	  	$Lecturer_Name = $row['Name'];
	  	
	  	//$CorId = $row['id'];	
?>
<?phph echo $course;  ?> 
    <option value="<?php echo "$Lecturer_Id"; ?>"><?php echo "$Lecturer_Name"; ?></option>
<?php  
   
		}
	}
?>
  
</select>

<br><br>

  
<?php if ($corse_Name == 'IT') {
	# code...
 ?>

<select class="minimal" name="as_code" required="">
  <option value="" disabled selected hidden>Assignment Code</option>

    <option value="1Y1S1A">1Y1S1A</option>
    <option value="1Y1S2A">1Y1S2A</option>
    <option value="1Y1S3A">1Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="1Y2S1A">1Y2S1A</option>
    <option value="1Y2S2A">1Y2S2A</option>
    <option value="1Y2S3A">1Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y1S1A">2Y1S1A</option>
    <option value="2Y1S2A">2Y1S2A</option>
    <option value="2Y1S3A">2Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y2S1A">2Y2S1A</option>
    <option value="2Y2S2A">2Y2S2A</option>
    <option value="2Y2S3A">2Y2S3A</option>

</select>

<?php
}else if ($corse_Name == 'M') {

?>
<select class="minimal" name="as_code" required="">
  <option value="" disabled selected hidden>Assignment Code</option>

    <option value="1Y1S1A">1Y1S1A</option>
    <option value="1Y1S2A">1Y1S2A</option>
    <option value="1Y1S3A">1Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="1Y2S1A">1Y2S1A</option>
    <option value="1Y2S2A">1Y2S2A</option>
    <option value="1Y2S3A">1Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y1S1A">2Y1S1A</option>
    <option value="2Y1S2A">2Y1S2A</option>
    <option value="2Y1S3A">2Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y2S1A">2Y2S1A</option>
    <option value="2Y2S2A">2Y2S2A</option>
    <option value="2Y2S3A">2Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="3Y1S1A">3Y1S1A</option>
    <option value="3Y1S2A">3Y1S2A</option>
    <option value="3Y1S3A">3Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="3Y2S1A">3Y2S1A</option>
    <option value="3Y2S2A">3Y2S2A</option>
    <option value="3Y2S3A">3Y2S3A</option>

</select>

<?php
}else if ($corse_Name == 'A') {

?>
<select class="minimal" name="as_code" required="">
  <option value="" disabled selected hidden>Assignment Code</option>

    <option value="1Y1S1A">1Y1S1A</option>
    <option value="1Y1S2A">1Y1S2A</option>
    <option value="1Y1S3A">1Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="1Y2S1A">1Y2S1A</option>
    <option value="1Y2S2A">1Y2S2A</option>
    <option value="1Y2S3A">1Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y1S1A">2Y1S1A</option>
    <option value="2Y1S2A">2Y1S2A</option>
    <option value="2Y1S3A">2Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y2S1A">2Y2S1A</option>
    <option value="2Y2S2A">2Y2S2A</option>
    <option value="2Y2S3A">2Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="3Y1S1A">3Y1S1A</option>
    <option value="3Y1S2A">3Y1S2A</option>
    <option value="3Y1S3A">3Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="3Y2S1A">3Y2S1A</option>
    <option value="3Y2S2A">3Y2S2A</option>
    <option value="3Y2S3A">3Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="4Y1S1A">4Y1S1A</option>
    <option value="4Y1S2A">4Y1S2A</option>
    <option value="4Y1S3A">4Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="4Y2S1A">4Y2S1A</option>
    <option value="4Y2S2A">4Y2S2A</option>
    <option value="4Y2S3A">4Y2S3A</option>

</select>

<?php
}else if ($corse_Name == 'BA') {

?>
<select class="minimal" name="as_code" required="">
  <option value="" disabled selected hidden>Assignment Code</option>

    <option value="1Y1S1A">1Y1S1A</option>
    <option value="1Y1S2A">1Y1S2A</option>
    <option value="1Y1S3A">1Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="1Y2S1A">1Y2S1A</option>
    <option value="1Y2S2A">1Y2S2A</option>
    <option value="1Y2S3A">1Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y1S1A">2Y1S1A</option>
    <option value="2Y1S2A">2Y1S2A</option>
    <option value="2Y1S3A">2Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y2S1A">2Y2S1A</option>
    <option value="2Y2S2A">2Y2S2A</option>
    <option value="2Y2S3A">2Y2S3A</option>

</select>

<?php
}else if ($corse_Name == 'THM') {

?>
<select class="minimal" name="as_code" required="">
  <option value="" disabled selected hidden>Assignment Code</option>

    <option value="1Y1S1A">1Y1S1A</option>
    <option value="1Y1S2A">1Y1S2A</option>
    <option value="1Y1S3A">1Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="1Y2S1A">1Y2S1A</option>
    <option value="1Y2S2A">1Y2S2A</option>
    <option value="1Y2S3A">1Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y1S1A">2Y1S1A</option>
    <option value="2Y1S2A">2Y1S2A</option>
    <option value="2Y1S3A">2Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y2S1A">2Y2S1A</option>
    <option value="2Y2S2A">2Y2S2A</option>
    <option value="2Y2S3A">2Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="3Y1S1A">3Y1S1A</option>
    <option value="3Y1S2A">3Y1S2A</option>
    <option value="3Y1S3A">3Y1S3A</option>


</select>

<?php
}else if ($corse_Name == 'E') {

?>
<select class="minimal" name="as_code" required="">
  <option value="" disabled selected hidden>Assignment Code</option>

    <option value="1Y1S1A">1Y1S1A</option>
    <option value="1Y1S2A">1Y1S2A</option>
    <option value="1Y1S3A">1Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="1Y2S1A">1Y2S1A</option>
    <option value="1Y2S2A">1Y2S2A</option>
    <option value="1Y2S3A">1Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y1S1A">2Y1S1A</option>
    <option value="2Y1S2A">2Y1S2A</option>
    <option value="2Y1S3A">2Y1S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="2Y2S1A">2Y2S1A</option>
    <option value="2Y2S2A">2Y2S2A</option>
    <option value="2Y2S3A">2Y2S3A</option>

    <option value=" " disabled>---------------</option>    

    <option value="3Y1S1A">3Y1S1A</option>
    <option value="3Y1S2A">3Y1S2A</option>
    <option value="3Y1S3A">3Y1S3A</option>


</select>

<?php } ?>


<br><br>
<!-- <div class="upload-btn-wrapper">
  <button class="btn">Upload Project Files</button>
  <input type="file" name="file" multiple>
</div>-->

	<input type="file" name="file" multiple="multiple" required=""> <br><br>

	<button type="submit" name="submit" value="submit" class="button" style="vertical-align:middle"><span>SUBMIT </span></button>
  
  </form>
</div>





  
</body>
</html>



