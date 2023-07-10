<?php 
include 'admin_login.php';
$conn = new mysqli('localhost', 'root', '', 'project_management');



$adminEmail = $_SESSION['email'];
$sql = $conn->query("SELECT id FROM admin WHERE email = '$adminEmail'");
					$data = $sql->fetch_assoc();

					 $AdminID = $data['id'];


if (isset($_POST['subID_send'])) {

	$SId = $_POST['subID'];
	$A_Id = $_POST['assignCode'];

	$sql4= "DELETE FROM temp_data WHERE member_ID = '$AdminID'";
		if (mysqli_query($conn, $sql4)) {}
	  


	 $sql2="INSERT INTO temp_data (member_ID,type,value,assign_Code)VALUES('$AdminID','sub_ID','$SId','$A_Id')";
	    if(mysqli_query($conn,$sql2)){
	    }
	
}

$sql3 = $conn->query("SELECT value, assign_Code FROM temp_data WHERE member_ID = '$AdminID'");
					$data3 = $sql3->fetch_assoc();

					 $SId = $data3['value'];
					 $a_Id = $data3['assign_Code'];



if (isset($_POST['addMark'])) {

	$mark = $_POST['mark'];
	$p_id = $_POST['proID'];

	$sql1= "UPDATE project SET Marks ='$mark' WHERE pNo = '$p_id'";
		if (mysqli_query($conn, $sql1)) { }


}



if (isset($_POST['release'])) {

	$Code_Asign = $_POST['assig_Code'];


	$sql1= "UPDATE project SET Release_Marks ='1' WHERE project_code = '$Code_Asign' AND admin_id = '$AdminID' AND sub_id  = '$SId'";
		if (mysqli_query($conn, $sql1)) { }
	  
	
}

if (isset($_POST['markList'])) {

	$sql7 = $conn->query("SELECT subName FROM subject WHERE id = '$SId'");
					$data7 = $sql7->fetch_assoc();

					 $Sub_name = $data7['subName'];

	require('FPDF/fpdf.php');

	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',14);
	$pdf->SetLeftMargin(50);
	$pdf->SetRightMargin(50);


	$pdf->Cell(110,7,'Subject - '.$Sub_name,'0','1','C');
	$pdf->Cell(10,7,'No.','1','0','C');
	$pdf->Cell(60,7,'Registration Number','1','0','C');
	$pdf->Cell(40,7,'Marks','1','1','C');

	$pdf->SetFont('Arial','',12);

	$no=1;
	$sql = "SELECT DISTINCT member.reg_num, Marks FROM project INNER JOIN member ON project.member_id = member.id WHERE sub_id = '$SId' AND admin_id = '$AdminID' AND  project_code = '$a_Id' AND deletePro = '0' ORDER BY member.reg_num ASC";
   		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$sId[0] = $row['reg_num'];
			$pMarks = $row['Marks'];

			$pdf->Cell(10,7,$no,'1','0','C');
			$pdf->Cell(60,7,$sId[0],'1','0','C');
			$pdf->Cell(40,7,$pMarks,'1','1','C');

			$no++;
		
		}



	$pdf->Output();


	//$Code_Asign = $_POST['assig_Code'];


	//$sql1= "UPDATE project SET Release_Marks ='1' WHERE project_code = '$Code_Asign' AND admin_id = '$AdminID' AND sub_id  = '$SId'";
	///	if (mysqli_query($conn, $sql1)) { }
	  
	
}


if (isset($_POST['delP'])) {

		$p_id = $_POST['proID'];

		$sql1= "UPDATE project SET deletePro ='1' WHERE pNo = '$p_id'";
		if (mysqli_query($conn, $sql1)) { }

}
	//echo $AdminID ;

	//$_SId = $_GET['data'];
	//echo $_SId ;



	//echo $Sub_id;
	//echo "Working";

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="navi.css">


</head>
<style>

	.badge1 {
  position: absolute;
  top: 10px;
  right: 985px;
  padding: 1px 3px;
  border-radius: 20%;
  background: red;
  color: white;
}



#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #6E6E6E;
  color: white;
}


.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 7px 18px;
  cursor: pointer;
  font-size: 15px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}

.btnS {
  background-color: #4ECB4A;
  border: none;
  color: white;
  padding: 7px 18px;
  cursor: pointer;
  font-size: 15px;
}

/* Darker background on mouse-over */
.btnS:hover {
  background-color: #4BAC3F;
}

.btnSu {
  background-color: #E40C2B;
  border: none;
  color: white;
  padding: 7px 18px;
  cursor: pointer;
  font-size: 15px;
}

/* Darker background on mouse-over */
.btnSu:hover {
  background-color: #EF0D50;
}

.btnM {
  background-color: #0B4141;
  border: none;
  color: white;
  padding: 7px 18px;
  cursor: pointer;
  font-size: 15px;
}

/* Darker background on mouse-over */
.btnM:hover {
  background-color: #EF0D50;
}

.btnR {
  background-color: #1A2238;
  border: none;
  color: white;
  padding: 7px 18px;
  cursor: pointer;
  font-size: 15px;
}

/* Darker background on mouse-over */
.btnR:hover {
  background-color: #1BA098;
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
					<span class="badge1" ><?php echo $Acount;?></span>
				</a>
			</div>	
		</th>
		
		<th width="7%">
			<div class="navbar">
				<a href="Miniupload.php"> <img src="images/upload_i.png" height="25px" width="25px"></a>
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




<table id="customers">
  <tr>
    <th width="25px">No.</th>
    <th width="125px">Registration Number</th>
    <th width="225px">Topic</th>
    <th width="325px">File</th>
    <th width="125px">Date</th>
    <th>Download</th>
    <th>Publish</th>
    <th colspan="2">Add Marks</th>
    <th colspan="2">Delete</th>

  </tr>
<?php 
	$ab=1;
	$sql = "SELECT  member.reg_num, pNo,Topic, files, uploadDate,publish,Marks,project_code FROM project INNER JOIN member ON project.member_id = member.id WHERE sub_id = '$SId' AND admin_id = '$AdminID' AND project_code = '$a_Id' AND deletePro = '0' ORDER BY uploadDate ASC";
   		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$sId[0] = $row['reg_num'];
			$p_num[0] = $row['pNo'];
			$Topic[0] = $row['Topic'];
			$file[0] = $row['files'];
			$time[0] = $row['uploadDate'];
			$pub = $row['publish'];
			$pMarks = $row['Marks'];
			$pCode = $row['project_code'];

		
?>

  <tr>
    <td><?php echo $ab; $ab++;?></td>
    <td><?php echo $sId[0]; ?></td>
    <td><?php echo $Topic[0]; ?></td>
    <td><?php echo $file[0]; ?></td>
    <td><?php echo $time[0];  ?></td>
  

    <td width="130px"><a href="downloadFile.php?file=<?php echo $file[0] ?>"><button class="btn"><i class="fa fa-download fa-1x" > </i> Download</button></a></td>

    <?php if($pub == 0) { ?>
    <td width="110px"><a href="Pupdate.php?data=<?php echo $p_num[0] ?>"><button class="btnS"><i class="fa fa-eye fa-1x" ></i> Publish</button></a></td>
   
    
	<?php }else {?>

	<td width="125px"><a href="unpub.php?data=<?php echo $p_num[0] ?>"><button class="btnSu"><i class="fa fa-eye-slash fa-1x" ></i> UnPublish</button></a></td>
	
	<?php }?>

	<td width="205px"><form action="inboxStore.php" method="POST"><input type="Number" size="4" min="0" max="100" step="any" name="mark" value="<?php echo $pMarks ?>" > /100</td>

	<td width="50px"> 
		<input type="hidden"  name="proID" value="<?php echo $p_num[0]; ?>">
		<input type="submit" name="addMark" class="btnM" value="ADD"></form>
	</td>

	<td width="10px">
	  	<form action="inboxStore.php" method="POST">
	  		<input type="hidden"  name="proID" value="<?php echo $p_num[0]; ?>">
	  		<button name="delP" > <i class="fa fa-trash fa-2x" aria-hidden="true" style="color:red"></i></button>
	    </form>
	</td>

  </tr>
<?php 

		}

?>
  
</table>

<br>
	
  	<!-- Release Button
		<form action="inboxStore.php" method="POST" >
			<input type="hidden" name="assig_Code" value="<?php echo $pCode;?> ">
			<b><input type="submit" name="release" value="RELEASE MARKS" class="btnR"></b>
		</form>
	-->

<br>

  	<!-- download Button-->
		<form action="inboxStore.php" target="_blank" method="POST" >
			<input type="hidden" name="assig_Code" value="">
			<b><input type="submit" name="markList" value="DOWNLOAD LIST" class="btnR"></b>
		</form>
	

<br>

</body>
</html>

<?php
$sql= "UPDATE project SET watched ='1' WHERE sub_id = '$SId'";
		if (mysqli_query($conn, $sql)) {
		 
		}




?>