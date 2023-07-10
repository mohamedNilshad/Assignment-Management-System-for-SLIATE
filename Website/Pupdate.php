<?php

$conn = new mysqli('localhost', 'root', '', 'project_management');




if(!empty($_GET['data'])){

	$_SId = $_GET['data']; 

	echo $_SId;

	$sql= "UPDATE project SET publish ='1' WHERE pNo = '$_SId'";
		if (mysqli_query($conn, $sql)) {
		 //echo "Record Deleted successfully";
		header("location: inboxStore.php");
		 echo "Published";
		  
		} else {
		  echo "Error in Deleting record: " . $conn->error;
		}

}
?>