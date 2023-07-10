<?php 
include_once 'config.php';
include 'admin_login.php';
// where (year = student.year) && (who = 0) && (who = myid)

  $email = $_SESSION['email'];

    $sql2 = $con->query("SELECT id FROM admin where email = '$email'");
    $data2 = $sql2->fetch_assoc();                  
    $Admin_id= $data2['id'];

if(isset($_POST['submit'])){

        
        $message = $_POST['message'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $type = $_POST['type'];
        $subject = $_POST['subject'];


      	
  if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
     
  
      
      
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"files/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
   else{
      $file_name = " ";
   }
      


      date_default_timezone_set('Asia/Kolkata');
      $date = date('y-m-d h:i:s');
      $status = "unread";
    
      $c= 1;

 
     $sql = mysqli_query($conn, "SELECT notify_num FROM notification ORDER BY notify_num DESC LIMIT 1");
      $Mcount = mysqli_fetch_row($sql);

       $Mcount[0] += 1;

     
        
        $query ="INSERT INTO notification (course_id, sub_id, batch, type, message, file,rdate, status,notify_num) VALUES ('$course', ' $subject','$year','$type','$message', '$file_name','$date', '$status','$Mcount[0]')";
        if(mysqli_query($conn, $query)){
          //header("location:home.php");
              //echo "$course ==";
         // echo " $year ";
        }

        else{
          echo "Not uploaded";
        }
        
    
}


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="footer, address, phone, icons" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="navi.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
 

</head>

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
        <a class="active" href="message.php">Message</a>
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
        </a>
      </div>  
    </th>
    
    <th width="7%">
      <div class="navbar">
        <a href="Miniupload.php"> <i class="fa fa-cloud-upload fa-2x" aria-hidden="true"></i></a>
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
            










<form action="message.php" method="POST" name="upload" enctype="multipart/form-data">

  <br> <br>  

<!-- if it's group-->

  <label>Choose Course</label>
  <select name="course" id="course" required="" onchange="FetchYear(this.value)">
    <?php
      //include_once 'config.php';
      $query = "SELECT * FROM course WHERE id !='0' ORDER BY id";
      $result = $conn->query($query);
    ?>

            <option value="">Select course</option>
          <?php
            if ($result->num_rows > 0 ) {
               while ($row = $result->fetch_assoc()) {
                echo '<option value='.$row['id'].'>'.$row['CoursrsName'].'</option>';
               }
            }
          ?> 
          </select>



      <label>Choose Subject</label>
      <select name="subject" id="sub" required="" >
        <option>Subject</option>
      </select>
      <br><br>

      <label>Choose Year</label>
      <select name="year" id="year" required="">
        <option disabled="" selected="">Year</option>
        <?php 
        	$crntYear = date("Y");
        	$setYear =  $crntYear - 4;

        	while($setYear<($crntYear)){
        ?>
        	<option><?php echo $setYear ?></option>

        <?php
        	$setYear++;
        	}

        ?>
      </select>


      <label>Choose Type</label>
      <select name="type" id="type" required="">
        <option disabled="" selected="">Type</option>
        <option>FULL TIME</option>
        <option>PART TIME</option>
      </select>
  
  <br><br> 
 <textarea rows="4" cols="50" name="message" placeholder="Write Somthing..."></textarea><br><br>

 <input type="file" name="image" /> <br><br>

 <input type="submit" name="submit" value="Submit">
</form>



<script type="text/javascript">
  function FetchYear(id){
    $('#sub').html('');
    //$('#type').html('<option>Select type</option>');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { course_id : id},
      success : function(data){
         $('#sub').html(data);
      }

    })
  }

  /*function FetchType(id){ 
    $('#type').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { year_id : id},
      success : function(data){
         $('#type').html(data);
      }

    })
  }*/


</script>
</body>
</html>