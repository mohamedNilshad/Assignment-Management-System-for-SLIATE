<?php 

include 'admin_login.php';
$conn = new mysqli('localhost', 'root', '', 'project_management');

$adminEmail = $_SESSION['email'];
$sql = $conn->query("SELECT id FROM admin WHERE email = '$adminEmail'");
					$data = $sql->fetch_assoc();

					$AdminID = $data['id'];

	$sql = mysqli_query($conn, "SELECT DISTINCT sub_id FROM project WHERE admin_id = '$AdminID' ");
	$Count_Cour = mysqli_num_rows($sql);
	//echo $Count_Cour;

?>



<html>
<head> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />


	<link rel="stylesheet" href="navi.css">
	<link rel="stylesheet" href="mini.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
.badge {
  position: absolute;
  top: 10px;
  right: 985px;
  padding: 1px 3px;
  border-radius: 20%;
  background: red;
  color: white;
}


.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 15%;
  height:20%;
	text-align: center;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
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
			    <a href="Adminchangepassword.php?data= <?php echo  $AdminID; ?>" ><font color="#394F8A">Change Password</font></a>
			    <a href="AdminchangeEmail.php?data= <?php echo  $AdminID; ?>"><font color="#394F8A">Change Email</font></a>
			    <a href="AdminRecycleBin.php?data= <?php echo  $AdminID; ?>"><font color="#394F8A">Recycle Bin</font></a>
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
		
		<th width="6%">
			<div class="navbar">
				<a class="active" href="inbox.php" class="notification" >
					<span><i class="fa fa-inbox fa-2x" aria-hidden="true"></i></span>
					<?php
				  		$sql = mysqli_query($conn, "SELECT * FROM project WHERE admin_id = '$AdminID' AND watched ='0'");
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


<section>
	<div class="container">

<?php
		$a=0;
		

		 $sql = "SELECT DISTINCT project_code, member.batch,subject.SubName,course.CoursrsName,sub_id, course_type,uploadDate FROM project INNER JOIN member ON project.member_id = member.id INNER JOIN course ON project.course_id= course.id INNER JOIN subject ON project.sub_id = subject.id WHERE admin_id = '$AdminID' ORDER BY uploadDate DESC";
		
		$result = $conn->query($sql);
		while(($a<$Count_Cour) && ($row = $result->fetch_assoc())){
			  	 $sId[0] = $row['sub_id'];
			 	 $Batch = $row['batch'];
			  	 $SubjectName = $row['SubName'];
			  	 $time = $row['uploadDate'];
			  	 $cName= $row['CoursrsName'];
	 			 $cType= $row['course_type'];
	 			 $aCode= $row['project_code'];

	  			echo "<br>";
			
		
				
?>
					<div class="card">
						<div class="content">
						
							<div class="contentBx">
								<h2><span><?php echo "$cName"?></span></h2>
								<hr>
								<h2><span><?php echo "$Batch"?></span></h2>
								<h2><span><?php echo "$cType"?></span></h2>
								<h2><span><?php echo "$SubjectName"?></span></h2>
								<h2><span><?php echo "$time"?></span></h2>
							</div>
						</div>
						<div class="sci">
							<li>
								<form action="inboxStore.php" method="POST"> 
									<input type="hidden"  name="subID" value="<?php echo $sId[0]; ?>">
									<input type="hidden"  name="assignCode" value="<?php echo $aCode; ?>">
									<input type="submit" name="subID_send" value="SEE">
								</form>
								<!--<a href='inboxStore.php?data= <?php echo "$sId[0]"?>' name="seeFile">SEE</a>-->
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