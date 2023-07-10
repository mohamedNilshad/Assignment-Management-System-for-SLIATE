<?php

   include 'admin_login.php';
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "project_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
	$email = $_SESSION['email'];

			$sql1 = $con->query("SELECT id FROM admin where email = '$email'");
			$data1 = $sql1->fetch_assoc();
											
			$Admin_id= $data1['id'];

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{

		if(isset($_POST['submit'])){

		
	   		$Course_Name = $_POST['CourseName']; 
	   		$Description = $_POST['CourseDec'];
	   		

			$a= 1;

			$sql = mysqli_query($conn, "SELECT * FROM minicourse ORDER BY srl_No DESC LIMIT 1");
			$serial_No = mysqli_fetch_row($sql);

			$serial_No = $serial_No[1] + $a;

		    $countfiles = count($_FILES['myfile']['name']);
		   
			$a= 1;
		    for($i=0;$i<$countfiles;$i++){

		    	$tmpFilePath = $_FILES['myfile']['tmp_name'][$i];

		    	if ($tmpFilePath != ""){
				    //Setup our new file path
				    $newFilePath = "./course/" . $_FILES['myfile']['name'][$i];

				    //Upload the file into the temp dir
	    			if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			        	$filename = $_FILES['myfile']['name'][$i];
			        	$sql = "INSERT INTO minicourse (srl_No,Admin_ID,Course_Name,description,myfile)VALUES
			        	('$serial_No','$Admin_id','$Course_Name','$Description','$filename')";
			
			        	if ($conn->query($sql) === TRUE) {
				     	
						} 
			
			    	}
				}
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
		<link rel="stylesheet" href="up.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		
	</head>


<style>
	/* CSS */
<style>
	.button {
	  background-color: #4CAF50; /* Green */
	  border: none;
	  color: white;
	  padding: 26px 42px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 20px;
	  margin: 4px 2px;
	  transition-duration: 0.4s;
	  cursor: pointer;

	}

	.button5 {
	  background-color: #555555;
	  color: white;
	  border: 2px solid #555555;
	  height:40px;
	  width:100px;
	}

	.button5:hover {
	  background-color:  white;
	  color: black;
	}


.badge {
  position: absolute;
  top: 10px;
  right: 985px;
  padding: 1px 3px;
  border-radius: 20%;
  background: red;
  color: white;
  }


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





</style>













<body>

<!--Navigation Bar -->
<table style="width:100%" border="0" collapse="0">
	<tr  style="height:20px">
		<th width="5%" align="left">
			<div class="dropdown">
			  <button class="dropbtn"><img src="images/logo.png" height="20px" width="20px"></button>
			  <div class="dropdown-content">
			    <a href="Adminchangepassword.php?data= <?php echo  $Admin_id; ?>" ><font color="#394F8A">Change Password</font></a>
			    <a href="AdminchangeEmail.php?data= <?php echo  $Admin_id; ?>"><font color="#394F8A">Change Email</font></a>
			    <a href="AdminRecycleBin.php?data= <?php echo  $Admin_id; ?>"><font color="#394F8A">Recycle Bin</font></a>
			    <a href="index.php"><font color="Blue"><b>Logout</b></font></a>
			  </div>
			</div>
		</th>
		
		<th width="6%">		
			<div class="navbar">
				<a href="a_main.php">Home</a>
			</div>	
		</th>
		
		
		
		<th width="9%">
			<div class="navbar">
				<a href="a_mini.php"> Mini Course</a>
			</div>	
		</th>
		
		<th width="11%">		
			<div class="navbar">
				<a href="ask_the_expert_admin.php"> Ask the Expert </a>
			</div>	
		</th>

		<th width="7%">
	      <div class="navbar">
	        <a href="message.php">Message</a>
	      </div>  
	    </th>
		
		<th width="5%">
			<div class="navbar">
				<a href="inbox.php" class="notification">
					<span><i class="fa fa-inbox fa-2x" aria-hidden="true"></i></span>
						<?php
					  		$sql = mysqli_query($conn, "SELECT * FROM project WHERE admin_id = '$Admin_id' AND watched ='0'");
							$Acount = mysqli_num_rows($sql);
				  		?>
					<span class="badge" ><?php echo $Acount;?></span>
				</a>
			</div>	
		</th>
		
		<th width="7%">
			<div class="navbar">
				<a class="active" href="Miniupload.php"><i class="fa fa-cloud-upload fa-2x" aria-hidden="true"></i></a>
			</div>	
		</th>
		
		
		
		<th>
			<div class="topnav">
				<div class="search-container">
					<form action="#">
						<input type="text" placeholder="Search.." name="search">
						<button type="submit" name = "search"><i>search</i></button>
					</form>
				</div>
			</div>
		</th>
	</tr>
</table>


<br><br>



<!-- From -->
<div class="login-box">
  <h2>Upload Mini Course</h2>
  <form action = "Miniupload.php" method = "post"  enctype="multipart/form-data">

   

	<div class="user-box">
      <input type="text" name="CourseName" required="">
      <label>Course Name</label>
    </div>

    <div class="user-box">
      <input type="text" name="CourseDec" required="">
      <label>Course Description</label>
    </div>

	<br>

	<div class="bn17"> 
		<label>Select Course Videos</label><br>
	  <input type="file" name="myfile[]" id="file" multiple value = "Select Course files">
	</div>
	
	

	<br><br>
	
		<button type="submit" class="button button5" name="submit"><b>UPLOAD</b></button>
	
  </form>
</div>


</body>
</html>



