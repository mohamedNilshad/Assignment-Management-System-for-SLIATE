<?php
include 'admin_login.php';

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
		$email = $_SESSION['email'];

		$sql2 = $con->query("SELECT id FROM admin where email = '$email'");
		$data2 = $sql2->fetch_assoc();									
		$Admin_id= $data2['id'];

	$sql = mysqli_query($conn, "SELECT DISTINCT pNo FROM project WHERE publish = '1' ");
	$Count_pro = mysqli_num_rows($sql);

		$a = 0;


?>




<html>
	<head> 
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="footer, address, phone, icons" />

		<link rel="stylesheet" href="navi.css">
	 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 	<link rel="stylesheet" href="mini.css">
	</head>
	<!--<head> <link rel="stylesheet" href="style8.css"></head> -->

<style type="text/css">
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
				<a class="active" href="a_main.php">Home</a>
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
				<a href="Miniupload.php"><i class="fa fa-cloud-upload fa-2x" aria-hidden="true"></i></a>
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
  
  
<!-- Home -->
 
<h2>Projects [Admin Page]</h2>





<section>
	<div class="container">
<?php	
		



		$sql = "SELECT pNo,Topic,member.name FROM project INNER JOIN member ON project.member_id = member.id WHERE publish = '1' ORDER BY pNo DESC ";
		$result = $conn->query($sql);
		while(($a<$Count_pro) && ($row = $result->fetch_assoc())){
			$proNo[0] = $row['pNo'];
			$Topic[0] = $row['Topic'];
			$name[0] = $row['name'];


				/*$sqlN = $conn->query("SELECT Course_Name FROM minicourse where srl_No='$SNo[0]'");
					$data = $sqlN->fetch_assoc();*/
					

?>
		
				
					<div class="card">
						<div class="content">
							<div class="imgBx">
								<img src="images/pro4.jpg">
							</div>
							<div class="contentBx">
								<h3><?php echo $Topic[0]; ?><br><span>Done by :<?php echo $name[0]; ?></span></h3>
							</div>
						</div>
						<div class="sci">
							<li>
								<a href='dPro.php?data= <?php echo "$proNo[0]"?>' name="start">SEE IT</a>
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