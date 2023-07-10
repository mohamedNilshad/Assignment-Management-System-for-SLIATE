<?php

   include 'admin_login.php';
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
				<a href="a_main.php">Home</a>
			</div>	
		</th>
		
		
		<th width="9%">
			<div class="navbar">
				<a class="active" href="a_mini.php"> Mini Course</a>
			</div>	
		</th>
		
		<th width="11%">		
			<div class="navbar">
				<a href="ask_the_expert_admin.php"> Ask the Expert </a>
			</div>	
		</th>
		
		<th width="5%">
			<div class="navbar">
				<a href="inbox.php" class="notification">
					<span><img src="images/inbox.png" height="25px" width="25px"></span>
					<span class="badge">0</span>
				</a>
			</div>	
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
	<?php

 			if($L_email == $_SESSION['email']){

 	 ?>
 				<a href="deleteMiniCourse.php?data= <?php echo $cNo; ?>" class = "vertical-center" name="deletCourse"><font face="Arial"><b> DELETE THIS COURSE:</b></font></a>


 		<?php } ?>
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

	<?php
 		if($L_email == $_SESSION['email']){
 	 ?>


		<form action="quiz.php" method="POST">
			<input type="hidden" name="miniCourse_id" value="<?php echo $cNo; ?>">
			<input type="hidden" name="admin_id" value="<?php echo $L_email; ?>">
			<input type="submit" name="add_Question" value="ADD New Question">
		</form>	


	<?php } ?>

		<form action="doQuiz.php" method="POST">
			<input type="hidden" name="miniCourse_id" value="<?php echo $cNo; ?>">
			<input type="submit" name="Do_Question" value="QUIZ">
		</form>

 </body>
</html>    
