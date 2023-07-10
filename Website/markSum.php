<?php
	include_once 'config.php';
	include 'validation.php';

	$memberId = $_SESSION['userId'];



	$sql = $conn->query("SELECT course_id FROM member WHERE id = '$memberId'");
					$data = $sql->fetch_assoc();

					$courseID = $data['course_id'];

	$page = 0;



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



	if (isset($_POST['page0'])) {

		
		//$subId = $_POST['subcode'];
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





		//$strArray1 = explode('',$assignCode);
		$strArray1 = str_split($assignCode);
		$year_no = $strArray1[0];
		$semester_no = $strArray1[2];

		//echo "Year = ". $year_no ."Sem = ".$semester_no;
		if (($year_no == '1') && ($semester_no == '1' )) { $sem_no = '1';  $year1="1<sup>st </sup> Year"; $sem1="1<sup>st </sup> Semester";}
		else if (($year_no == '1') && ($semester_no == '2' )) { $sem_no = '2'; $year1="1<sup>st </sup> Year"; $sem1="2<sup>nd </sup> Semester";}
		else if (($year_no == '2') && ($semester_no == '1' )) { $sem_no = '3'; $year1="2<sup>nd </sup> Year"; $sem1="1<sup>st </sup> Semester"; }
		else if (($year_no == '2') && ($semester_no == '2' )) { $sem_no = '4'; $year1="2<sup>nd </sup> Year"; $sem1="2<sup>nd </sup> Semester"; }
		else if (($year_no == '3') && ($semester_no == '1' )) { $sem_no = '5'; $year1="3<sup>rd </sup> Year"; $sem1="1<sup>st </sup> Semester"; }
		else if (($year_no == '3') && ($semester_no == '2' )) { $sem_no = '6'; $year1="3<sup>rd </sup> Year"; $sem1="2<sup>nd </sup> Semester"; }
		else if (($year_no == '4') && ($semester_no == '1' )) { $sem_no = '7'; $year1="4<sup>th </sup> Year"; $sem1="1<sup>st </sup> Semester"; }
		else if (($year_no == '4') && ($semester_no == '2' )) { $sem_no = '8'; $year1="4<sup>th </sup> Year"; $sem1="2<sup>nd </sup> Semester"; }


/*
		$sql2 = $conn->query("SELECT SubName FROM subject WHERE id = '$subId'");
		$data2 = $sql2->fetch_assoc();

		$sub_name = $data2['SubName'];
		

		$sql3 = $conn->query("SELECT SubName, project.Marks FROM project INNER JOIN subject ON project.sub_id = subject.id WHERE member_id = '$memberId' AND LIKE project_code = '{$assignCode}%'");
		$data3 = $sql3->fetch_assoc();

		$Sub_name = $data3['SubName'];
		$score = $data3['Marks'];


		if ($score > 0) {
			$rScore = $score." /100"; 
		}else{
			$rScore = "Pending / Processing"; 
		}
	*/	
		$page=1;
		
	
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
	<?php if ($page == 1) { ?>
		<div class="login-box">

					<img src="images/resultSheet.jpeg" width="10%" height="20%" align="left">
					<h2>SRI LANKA INSTITUTE OF ADVANCED TECHNOLOGICAL EDUCATION - KANDY </h2>
					<h3 align="center">SUMMERY OF ASSIGNMENTS MARKS </h3>
					<hr size="2px" width="95%" align="center" style="border: 1px solid #161F6D;">
					 
			<CENTER>
					<table border="1px" style="border-collapse: collapse;">
					 	<tr height="70px">
					 		<th align="left" colspan="3" ><?php echo $name; ?>  <br> <?php echo $reg_number; ?> <br> <?php echo $course_Name; ?></th>
					 	</tr>

					 	<tr height="5px">
					 		
					 	</tr>

					 	<tr height="30px">
					 		<th style="background-color:#181818;"></th>
					 		<th width="350px"> Subject </th>
					 		<th> Marks [ Total ] </th>
					 	</tr>

					 	<tr>
					 		<th width="110px" rowspan="9"><b> <?php echo $year1; ?> <br> <?php echo $sem1?> </b></th>
					 	</tr>

					 	<?php 

					 		$ca = 0;
					 		//$totalMark = 0;
					 		/*$sql4 = "SELECT project.Marks, SubName FROM project INNER JOIN subject ON project.sub_id = subject.id WHERE project_code LIKE '{$assignCode}%' AND  member_id = '$memberId'";
								$result = $conn->query($sql4);*/

							$sql4 = "SELECT id FROM subject WHERE Semester = '$sem_no' AND course_Id = '$course_id'";

								$result = $conn->query($sql4);
								  // output data of each row
								$ca = 0;
							while(($row = $result->fetch_assoc()) && ($ca<8)) {
								$sub_ID = $row['id'];
								
								

								$sql6 = $conn->query("SELECT project.Marks,SubName FROM project INNER JOIN subject ON project.sub_id = subject.id  WHERE member_id = '$memberId' AND sub_id =  '$sub_ID'");
								$data6 = $sql6->fetch_assoc();

								$sub_name = $data6['SubName'];
								$Mark = $data6['Marks'];

									if ($Mark > 0) {
									?>	
									 	<tr>
									 		<th align="left"> <?php echo $sub_name; ?> </th>
									 		<th><font color="blue">  <?php echo $Mark; ?></font></th>
									 	</tr>

									<?php
												}
								 	?>


							 	
							<?php $ca++; } ?>

					</table>
			</CENTER>


		</div>
					<a href="markSum.php" ><button style=" position: absolute; top: 85%; left: 45%;"> <- BACK TO SEARCH </a> </button>
	<?php } else if ($page == 0) { ?>

		<div class="login-box">
			  <h2>Find Your Summary of Semester Here</h2>

				<form action="markSum.php" method="POST" name="sumType">
			    
					<select class="minimal" name="as_code" required="">

					  	<option value="" disabled selected hidden>Select Semester</option>

					    <option value="1Y1S">1<sup>st</sup> Year 1<sup>st</sup> Semester</option>
					    <option value="1Y2S">1<sup>st</sup> Year 2<sup>nd</sup> Semester</option>  
					    <option value="2Y1S">2<sup>nd</sup> Year 1<sup>st</sup> Semester</option>
					    <option value="2Y2S">2<sup>nd</sup> Year 2<sup>nd</sup> Semester</option>

						<?php if (($corse_Name == 'M') || ($corse_Name == 'A') ||($corse_Name == 'THM')) { ?>
						    <option value="3Y1S">3<sup>rd</sup> Year 1<sup>st</sup> Semester</option>

						    <?php if (($corse_Name == 'M') || ($corse_Name == 'A')) { ?>
						    	<option value="3Y2S">3<sup>rd</sup> Year 2<sup>nd</sup> Semester</option>
							<?php } ?>

								<?php if ($corse_Name == 'A') { ?>
						    		<option value="4Y1S">4<sup>th</sup> Year 1<sup>st</sup> Semester</option>
						    		<option value="4Y2S">4<sup>th</sup> Year 2<sup>nd</sup> Semester</option>
								<?php } ?>

						<?php } ?>

					</select>

					<br><br>

					<button type="submit" name="page0" value=" " class="button" style="vertical-align:middle"><span>SEARCH</span></button>
			  
				</form>
		</div>
	<?php } ?>
	
	<!-- End -->



	<a href="m_main.php" ><button style=" position: absolute; top: 90%; left: 5%;" class="btn2 btn2h"> <- GO TO MAIN PAGE  </button></a>
	<a href="marksMain.php" ><button style=" position: absolute; top: 90%; right: 5%;" class="btn1 btn1h"> CHECK ASSIGNMENT MARKS -> </button></a>



</body>
</html>