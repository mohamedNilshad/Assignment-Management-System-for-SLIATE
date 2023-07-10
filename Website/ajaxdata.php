<?php 
include_once 'config.php';
$cor_id = $_POST['course_id'];
$year_id = " ";
if (isset($_POST['course_id'])) {
	$cor_id = $_POST['course_id'];
	$query = "SELECT DISTINCT SubName,id FROM subject WHERE course_id='$cor_id' ";
	
	$result = $conn->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Subject</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['id'].'>'.$row['SubName'].'</option>';
		 }
	}else{

		echo '<option disable="">Subject Not Found!</option>';

	}

}/*elseif (isset($_POST['year_id'])) {
	 
	$year_id = $_POST['year_id'];
	$query = "SELECT DISTINCT Type FROM member WHERE batch= '$year_id' ";
	$result = $conn->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Type</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['Type'].'>'.$row['Type'].'</option>';
		 }
	}else{

		echo '<option>No City Found!</option>';

		
	}

}*/


?>