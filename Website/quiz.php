<?php
	include_once 'config.php';
	include 'admin_login.php';

 	$admin_email = $_SESSION['email'];
	$new=1;
	$ans_no=1;
	


if (isset($_POST['add_Question'])) {
	$miniCID = $_POST['miniCourse_id'];
	$admin_id = $_POST['admin_id'];

	$sql4= "DELETE FROM temp_data WHERE assign_Code = '$admin_email'";
		if (mysqli_query($conn, $sql4)) {}

	 $sql2="INSERT INTO temp_data (member_ID,type,value,assign_Code)VALUES('$admin_id','miniC_ID','$miniCID','$admin_email')";
	    if(mysqli_query($conn,$sql2)){}

    
}	

$sql3 = $conn->query("SELECT value FROM temp_data WHERE assign_Code = '$admin_email'");
					$data3 = $sql3->fetch_assoc();

					 $miniCID1 = $data3['value'];


$sql1 = mysqli_query($conn, "SELECT id FROM quiz WHERE miniCourse_Id = '$miniCID1' ");
	$que_no = mysqli_num_rows($sql1);

	$que_no++;	

if (isset($_POST['newQue'])) {
	$question = $_POST['question'];

	$answer1 = $_POST['answer1'];
	$answer2 = $_POST['answer2'];
	$answer3 = $_POST['answer3'];
	$answer4 = $_POST['answer4'];

	$crctAns = $_POST['correct_answer'];


	$sql="INSERT INTO quiz (Question, answer_1, answer_2, answer_3, answer_4, correct_answer, miniCourse_Id)VALUES('$question','$answer1','$answer2','$answer3','$answer4','$crctAns','$miniCID1')";

    if(mysqli_query($conn,$sql)){
    	echo "1 question Added !";
		$que_no++;
	
    }


}





?>

<!DOCTYPE html>
<html>
<head>
	<title>quiz</title>

<style>
	.questions {
	  width: 80%;
	  padding: 15px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}	

	.answers {
	  width: 65%;
	  padding: 8px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}	
	.Canswer {
	  width: 20%;
	  padding: 8px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
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

	div {
	  border-radius: 5px;
	  background-color: #f2f2f2;
	  padding: 20px;
	}
</style>



</head>
<body>

	<form action="quiz.php" method="POST">
		<h2>ADD QUESTIONS</h2>


		<table border="0" width="70%">
			<tr>
					<td width="140px"><label><b> Question : <?php echo $que_no; $que_no++;?> </b></label></td>
					<td colspan="3"><input type="text" name="question" width="50px" height="20px" class="questions" required=""></td>			
			</tr>
			<tr>
					<td><label><b>Answer : <?php echo $ans_no; $ans_no++;?> </b></label></td>
					<td width="500px"><input type="text" name="answer1" width="50px" height="20px" class="answers" required=""></td>
					<td></td>
					<td></td>
			</tr>			
			<tr>
					<td><label><b>Answer : <?php echo $ans_no; $ans_no++;?> </b></label></td>
					<td width="500px"><input type="text" name="answer2" width="50px" height="20px" class="answers" required=""></td>
					<td></td>
					<td></td>
			</tr>				
			<tr>
					<td><label><b>Answer : <?php echo $ans_no; $ans_no++;?> </b></label></td>
					<td width="500px"><input type="text" name="answer3" width="50px" height="20px" class="answers" required=""></td>
					<td></td>
					<td></td>
			</tr>				
			<tr>
					<td><label><b>Answer : <?php echo $ans_no; $ans_no++;?> </b></label></td>
					<td width="500px"><input type="text" name="answer4" width="50px" height="20px" class="answers" required=""></td>
					<td></td>
					<td></td>
			</tr>				

			<tr>
					<td><label><b>Correct Answer :  </b></label></td>
					<td width="500px"><input type="Number" name="correct_answer" width="50px" height="20px" class="Canswer" min="1" max="4" required=""></td>
					<td></td>
					<td></td>
			</tr>	
	

		</table>

		<input type="submit" name="newQue" value="ADD">

	</form>

</body>
</html>