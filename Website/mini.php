
<?php
include_once 'config.php';

$sql = mysqli_query($conn, "SELECT srl_No FROM minicourse ORDER BY srl_No DESC LIMIT 1");

			$SNoM = mysqli_fetch_row($sql);

		$a = 0;

?>





<html>
    
	<head> 
		
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta name="keywords" content="footer, address, phone, icons" />

	<link rel="stylesheet" href="navi.css">
	<link rel="stylesheet" href="mini.css">
	
	</head>
   
    
 <body>
		  
<!--Navigation Bar -->
<table style="width:100%" border="0" collapse="0">
	<tr  style="height:20px">
		<th  width="1%">
		</th>
		<th  width="5%" align="left">
			<img src="images/logo.png" height="40px" width="40px"></a>
		</th>
		
		<th>	
			<div class="navbar">
				<a href="index.php">Home</a>
			</div>	
		</th>
		
		<th>
			<div class="navbar">
				<a href="newSignin.html">Student</a>
			</div>	
		</th>
		
		<th>
			<div class="navbar">
				<a href="admin.html">Lecturer</a>
			</div>	
		</th>
		
		<th width="10%">
			<div class="navbar">
				<a class="active" href="mini.php"> Mini Course</a>
			</div>	
		</th>
		
		<th width="10%">
			<div class="navbar">
				<a href="about.html"> About us</a>
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

		$sql = "SELECT DISTINCT srl_No FROM minicourse WHERE deleteNo = '0' ORDER BY srl_No DESC ";
		$result = $conn->query($sql);
		while(($a<$SNoM[0]) && ($row = $result->fetch_assoc())){
			$SNo[0] = $row['srl_No'];


				$sqlN = $conn->query("SELECT Course_Name FROM minicourse where srl_No='$SNo[0]'");
					$data = $sqlN->fetch_assoc();
					
?>
		
					<div class="card">
						<div class="content">
							<div class="imgBx">
								<img src="images/mini.PNG">
							</div>
							<div class="contentBx">
								<h3><?php echo $data['Course_Name'] ?><br><span>KANDY ATI</span></h3>
							</div>
						</div>
						<div class="sci">
							<li>
								<a href='UdCourse.php?data= <?php echo "$SNo[0]"?>' name="start">ENROLL</a>
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