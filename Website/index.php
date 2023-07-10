<?php
 
include_once 'config.php';

	$sql = mysqli_query($conn, "SELECT DISTINCT pNo FROM project WHERE publish = '1' ");
	$Count_pro = mysqli_num_rows($sql);

		$a = 0;


?>









<html>
	<head> 
		<link rel="stylesheet" href="navi.css">
		<link rel="stylesheet" href="mini.css">
		
		<!--<head> <link rel="stylesheet" href="style8.css"></head> -->
		 <meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <meta name="keywords" content="footer, address, phone, icons" />
	</head>
<body>


<!--Navigation Bar -->
<table style="width:100%"  collapse="1">
	<tr  style="height:20px">
		<th  width="1%">
		</th>
		<th  width="5%" align="left">
			<img src="images/logo.png" height="40px" width="40px"></a>
		</th>
		
		<th width="10%">	
			<div class="navbar">
				<a class="active" href="index.php">Home</a>
			</div>	
		</th>
		
		<th width="10%">
			<div class="navbar">
				<a href="newSignin.html">Student</a>
			</div>	
		</th>
		
		<th width="10%">
			<div class="navbar">
				<a href="admin.html">Lecturer</a>
			</div>	
		</th>
		
		<th width="10%">
			<div class="navbar">
				<a href="mini.php"> Mini Course</a>
			</div>	
		</th>

		<th width="10%">
			<div class="navbar">
				<a href="about.html"> About us</a>
			</div>	
		</th>
		

		
		<th>
			
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
  
  
<!-- Home 
 
<h2>Projects</h2>-->


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
								<a href='u_dPro.php?data= <?php echo "$proNo[0]"?>' name="start">SEE IT</a>
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