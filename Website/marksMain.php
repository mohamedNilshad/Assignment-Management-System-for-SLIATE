<?php
	include_once 'config.php';
	include 'validation.php';

	$memberId = $_SESSION['userId'];



	$sql = $conn->query("SELECT course_id FROM member WHERE id = '$memberId'");
					$data = $sql->fetch_assoc();

					$courseID = $data['course_id'];

	$Show_cont = 0;



 	$reg_number = $_SESSION['reg_num'];


	//getting corse and year from reg number
	$myString = "$reg_number";

	$strArray = explode('/',$myString);
	$corse_Name = $strArray[1];
	//$b_year = $strArray[2];
	//$c_type = $strArray[3];


		if($corse_Name == 'IT'){ $course_id = 4;}
		else if($corse_Name == 'M'){$course_id = 2;}
		else if($corse_Name == 'A'){$course_id = 3;}
		else if($corse_Name == 'BA'){$course_id = 6;}
		else if($corse_Name == 'THM'){$course_id = 5;}
		else if($corse_Name == 'E'){$course_id = 1;}



	if (isset($_POST['type1'])) {

		
		 $subId = $_POST['subcode'];
		 $assignCode = $_POST['as_code'];

		$sql1 = $conn->query("SELECT name FROM member WHERE id = '$memberId'");
		$data1 = $sql1->fetch_assoc();

		$name = $data1['name'];


		if($course_id == '4'){ $course_Name = "Higher National Diploma in Information Technology";}
		else if($course_id == '1'){ $course_Name = "Higher National Diploma in English";}
		else if($course_id == '2'){ $course_Name = "Higher National Diploma in Management";}
		else if($course_id == '3'){ $course_Name = "Higher National Diploma in Accountancy";}
		else if($course_id == '5'){ $course_Name = "Higher National Diploma in Tourism and Hospitality Management";}
		else if($course_id == '6'){ $course_Name = "Higher National Diploma in Business Administration";}


		$sql2 = $conn->query("SELECT SubName FROM subject WHERE id = '$subId'");
		$data2 = $sql2->fetch_assoc();

		$sub_name = $data2['SubName'];
		

		$sql3 = $conn->query("SELECT Name, project.Marks FROM project INNER JOIN admin ON project.admin_id = admin.id WHERE member_id = '$memberId' AND sub_id = '$subId'  AND project_code = '$assignCode'");
		$data3 = $sql3->fetch_assoc();

		$lectur_name = $data3['Name'];
		$score = $data3['Marks'];


		if ($score > 0) {
			$rScore = $score." /100"; 
		}else{
			$rScore = "Pending / Processing"; 
		}
		
		$Show_cont =1;
		
	}

	


?>

<!DOCTYPE html>
<html>
<head>
	<title>Assignments Marks</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, address, phone, icons" />

		<link rel="stylesheet" href="up.css">	


<style type="text/css">
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

  text-decoration: none;
 
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

	

.btn1 {
  width: 25%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn1h: hover {
  background-color: #45a049;
}

.btn2  {
  width: 13%;
  background-color: #BD1E51;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn2h :hover {
  background-color: #161F6D;
}

</style>












</head>
<body>



	<!-- Strat -->

<?php if ($Show_cont == 0) {   ?>

			<div class="login-box">
			  <h2>Find Your Assignment Marks Here</h2>

			  <form action="marksMain.php" method="POST" name="sumType">
			    
			 
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


				<button type="submit" name="type1" value=" " class="button" style="vertical-align:middle"><span>SEARCH</span></button>
			  
			  </form>
			</div>






<?php }else if ($Show_cont == 1) { ?>
		<div class="login-box">
			<img src="images/resultSheet.jpeg" width="10%" height="20%" align="left">
			 <h2>Your Result </h2><br>
			 <hr size="2px" width="80%" align="center" style="border: 1px solid skyblue;">
			 
			
			 <table border="0px" height="50%">
			 	<tr height="50px">
			 		<th>NAME </th>
			 		<th width="10px"> : </th>
			 		<td width="300px"> <font color="gray"> <?php echo $name; ?></font></td>
			 	</tr>

			 	<tr height="50px">
			 		<th width="200px">Registration Number </th>
			 		<th> : </th>
			 		<td><font color="gray"> <?php echo $reg_number; ?></font></td>
			 	</tr>

			 	 <tr height="50px">
			 		<th>Course </th>
			 		<th> : </th>
			 		<td><font color="gray"> <?php echo $course_Name; ?></font></td>
			 	</tr>

			 	 <tr height="50px">
			 		<th>Subject </th>
			 		<th> : </th>
			 		<td><font color="gray"> <?php echo $sub_name; ?></font></td>
			 	</tr>

			 	<tr height="50px">
			 		<th>Subject Lecturer </th>
			 		<th> : </th>
			 		<td><font color="gray"> <?php echo $lectur_name; ?></font></td>
			 	</tr>
			 	
			 	<tr height="50px">
			 		<th>Assignment Code</th>
			 		<th> : </th>
			 		<td><font color="gray"> <?php echo $assignCode; ?></font></td>
			 	</tr>

			 	<tr height="50px">
			 		<th><b><font size="5px">Score</font></b> </th>
			 		<th> : </th>
			 		<td><font color="gray"> <?php echo $rScore; ?></font></td>
			 	</tr>
			 </table>


		</div>
				<a href="marksMain.php" ><button style=" position: absolute; top: 90%; left: 45%;"> <- BACK TO SEARCH </a> </button>

<?php }?>





	<!-- End -->



<a href="m_main.php" style="text-decoration: none;"><button style=" position: absolute; top: 80%; left: 5%;" class="btn2 btn2h"> <- GO TO MAIN PAGE </button></a> 
<a href="markSum.php" style="text-decoration: none;"><button style=" position: absolute; top: 80%; right: 5%;" class="btn1 btn1h"> CHECK SUMMERY OF ASSIGNMENT MARKS -> </button></a>



</body>
</html>