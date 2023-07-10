<?php
include_once 'config.php';

$id = $_GET['data'];
$url = $_GET['url'];
 


$sql = "SELECT course.CoursrsName,subject.SubName,message,rdate,file FROM notification INNER JOIN course on notification.course_id = course.id INNER JOIN subject on notification.sub_id = subject.id WHERE notify_num = '$id'";
						$result = $conn->query($sql);
						  // output data of each row
					while($row = $result->fetch_assoc()) {
						$cName = $row['CoursrsName'];
						$message = $row['message'];
						$date = $row['rdate'];
						$file = $row['file'];
						$subName = $row['SubName'];

					}

		$sql= "UPDATE notification SET status ='read' WHERE notify_num = '$id'";
		if (mysqli_query($conn, $sql)) {
		// echo "Readed";
		} 


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
p {outline-color:blue;}


p.outset {outline-style: outset;}
</style>
</head>
<body>
	<h4><?php echo $cName ;?></h4>
	<h4><?php echo $subName ;?></h4>

	<p><b>Message : - </b><?php echo $message;?></p>
	<p><b>Send Date : - </b><?php echo $date; ?></p>
	

	<?php

		if($file != NULL){ 
	?>

			<p class="outset"> <?php echo $file; ?></p>
			<a href="asignDownload.php?file=<?php echo $file ?>"><button class="btn"><i class="fa fa-download fa-1x" > </i> Download</button></a>

	<?php
		}
	?>
		


<br>






	<!--<button type="button" onclick="alert('Hello world!')">Click Me!</button>-->
	<br><br><button type="button"><a href="<?php echo $url; ?>" style="text-decoration: none"> <b>Click Here to Exit!</b></a></button>
</body>
</html>