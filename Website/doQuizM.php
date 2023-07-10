<?php
	include_once 'config.php';


	$total = 0;
	$wrong = 0;
	$count = 0;
	$totalQues = 0;
	$q=0;
	$Q_id = array();

if (isset($_POST['Do_Question'])) {
	$miniCID = $_POST['miniCourse_id'];

	$sql4= "DELETE FROM temp_data WHERE assign_Code = '0' AND member_ID ='0'";
		if (mysqli_query($conn, $sql4)) {}

	 $sql2="INSERT INTO temp_data (member_ID,type,value,assign_Code)VALUES('0','miniC_ID','$miniCID','0')";
	    if(mysqli_query($conn,$sql2)){}

	   //$total = ;

    
}	



$sql3 = $conn->query("SELECT value,type FROM temp_data WHERE assign_Code = '0' AND member_ID ='0' ");
					$data3 = $sql3->fetch_assoc();
					 $miniCID1 = $data3['value'];
					 $i = $data3['type'];



if (isset($_POST['submitAnswe'])) {

	$sql = "SELECT id FROM quiz WHERE miniCourse_Id = '$miniCID1'  ORDER BY id DESC";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
				$Q_id[] = $row['id'];
			}
	$count = count($Q_id);
	$totalQues = $count ;
	//echo $count .'<br>';

	$i=0;
	while ($count>0) {
		$uCrAnswer = $_POST[$Q_id[$i]];

		$sql3 = $conn->query("SELECT correct_answer FROM quiz WHERE id = '$Q_id[$i]'");
		$row = $sql3->fetch_assoc();

		$crnt_ans = $row['correct_answer'];

		if($crnt_ans == $uCrAnswer ){

			$total +=1 ;
			//echo 'true'.'<br>';

		}
		else{
			//echo 'false'.'<br>';
			$wrong++;
		}

		//echo $miniCID. '<br>';

		$i++;
		$count--;
	}
		$total = ($total/$totalQues)*100;
		$q=1;

}



	//$sql1 = mysqli_query($conn, "SELECT id FROM quiz WHERE miniCourse_Id = '$miniCID' ");
	//$tot_que = mysqli_num_rows($sql1);

/*
if (isset($_POST['submitAnswer'])) {
	$miniCID = $_POST['miniCourse_id'];

	$sql4= "DELETE FROM temp_data WHERE assign_Code = '0' AND member_ID ='0'";
		if (mysqli_query($conn, $sql4)) {}

	 $sql2="INSERT INTO temp_data (member_ID,type,value,assign_Code)VALUES('0','0','$miniCID','0')";
	    if(mysqli_query($conn,$sql2)){}


	 $sql3 = $conn->query("SELECT id FROM quiz WHERE miniCourse_Id = '$miniCID1'  ORDER BY id DESC");
				$row = $sql3->fetch_assoc();

				
			$result = mysql_query("SELECT id FROM quiz WHERE miniCourse_Id = '$miniCID1'  ORDER BY id DESC");
			while($row = mysql_fetch_assoc($result))
			{
			  $Q_id[] = $row['id'];;
			}

			$No_Que = count($cars);

	        while ($i < $arrayLength) {
	            echo $CodeWallTutorialArray[$i] ."<br />";
	            $i++;
	        }
    
}	

*/






?>
<!DOCTYPE html>
<html>
<head>
	<title>Quiz_Time</title>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, address, phone, icons" />
		

<style>
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #04AA6D;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #1D2228;
  color: black;
}

.flip-card-back {
  background-color: #1D2228;
  color: white;
  transform: rotateY(180deg);
}



.center {
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
border: 5px solid #3FD2C7;
padding: 10px;
}



.content{
  margin: auto;
  padding: 15px;
  max-width: 800px;
  text-align: center;
}
.dpx{
  display:flex;
  align-items:center;
  justify-content:space-around;
}
h1{
  font-size:28px;
  line-height:28px;
  margin-bottom:15px;
}
label{
  display:block;
  line-height:40px;
}
.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 13.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 40px;
  width: 40px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #40e0d0;
}
.option-input:checked::before {
  width: 40px;
  height: 40px;
  display:flex;
  content: '\f00c';
  font-size: 25px;
  font-weight:bold;
  position: absolute;
  align-items:center;
  justify-content:center;
  font-family:'Font Awesome 5 Free';
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}

@keyframes click-wave {
  0% {
    height: 40px;
    width: 40px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}


td {
  vertical-align: bottom;
}

input[type=submit] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

input[type=reset] {
  width: 10%;
  background-color: #BD1E51;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=reset]:hover {
  background-color: #161F6D;
}




</style>




</head>
<body>


<?php	if($q==0){  ?>


		 <form action="doQuizM.php" method="POST">
			
		 	<?php 
					$q_no='1'; 
					$que_no='q1'; 

						

							$sql = "SELECT id, Question, answer_1,answer_2,answer_3,answer_4 FROM quiz WHERE miniCourse_Id = '$miniCID1' ORDER BY id DESC";
								$result = $conn->query($sql);
								  // output data of each row
							while($row = $result->fetch_assoc()) {
								$qiD = $row['id'];
			
								$question = $row['Question'];
								$ans_1 = $row['answer_1'];
								$ans_2 = $row['answer_2'];
								$ans_3 = $row['answer_3'];
								$ans_4 = $row['answer_4'];
				?>
		   

		    					

					

					 <!--
					    <input type="radio" name="<?php echo $qiD; ?>" value="1" required=""><?php echo $ans_1; ?>
					    <input type="radio" name="<?php echo $qiD; ?>" value="2" required=""><?php echo $ans_2; ?><br>
					    <input type="radio" name="<?php echo $qiD; ?>" value="3" required=""><?php echo $ans_3; ?>
					    <input type="radio" name="<?php echo $qiD; ?>" value="4" required=""><?php echo $ans_4; ?><br><br><hr>
-->
					    



							<div class='content'>
									<hr><h3>Quiz <?php echo $q_no; ?></h3>
								  <h2><?php echo $q_no. ". ".$question; ?></h2>
								<div class="dpx">
									<div class='py'>
										<table border="0" >
											<tr>
												  <label>
												   <td> <input type="radio" class="option-input radio" name="<?php echo $qiD; ?>" value="1" required=""></td>
												   <td> <?php echo $ans_1; ?></td>

												   	<td> <input type="radio" class="option-input radio" name="<?php echo $qiD; ?>" value="2" required=""></td>
												    <td> <?php echo $ans_2; ?></td>
												  </label>
											</tr>
											<tr>
												  <label>

												  </label>
											</tr>
											<tr>
											  <label>
											    <td><input type="radio" class="option-input radio" name="<?php echo $qiD; ?>" value="3" required=""></td>
											    <td><?php echo $ans_3; ?></td>

											    <td><input type="radio" class="option-input radio" name="<?php echo $qiD; ?>" value="4" required=""></td>
											   <td><?php echo $ans_4; ?></td>
											  </label> 
											</tr>
											<tr>
											  <label>

											  </label>
											</tr>
										</table>
									</div>
								</div>
							</div>

					
				<?php 
					$q_no++; 
					$que_no++; 
				}

				?>


			<center>
			  	<input type="submit" name="submitAnswe" value="SUBMIT" >
				<input type="reset" name="clearAnswer" value="CLEAR">
				<br>
		
		  
		  </form>
		  		<a href="m_mini.php"><button> <- Click Back To Main Page</button></a>
			</center>
<?php }else if($q==1){  ?>



		<center><h1>Your Result Is Ready to Show</h1></center>
		
	<div class="center">
		<div class="flip-card">
		  <div class="flip-card-inner">
		    <div class="flip-card-front">
		     <p><b><font color="#99DDFF" size="5px">Click Me</font></b></p>
		     <img src="images/resultSheet.jpeg" width="60%" height="75%">
		    </div>
		    <div class="flip-card-back">
		      <h2>Number of Questions : <font color="#FDD935"><?php echo $totalQues; ?></font></h2> 
		      <h2> Number of Correct Questions : <font color="#FDD935"><?php echo ($totalQues - $wrong); ?></font> </h2> 
		      <h1> Score: <font color="#FDD935"><?php echo round($total, 2); ?> /100 </h1> 
		      
		      <p><b><font color="#EF0D50" size="7px">Thank You</font></b></p>
		    </div>
		  </div>
		</div>
</div>
		<center><a href="m_mini.php"><button> <- Click Back To Main Page</button></a></center>
<?php
	}
?>




</body>
</html>

