 <?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db="project_management";

  $conn = mysqli_connect($servername, $username, $password,$db);

  if(isset($_POST["submit"]))
    {
              
        $fullName = $_POST['FName']; 
        
        $email = $_POST['email_E']; 

        $password = $_POST['password_E']; 

        $passwordEn = md5($password);


        $sql="INSERT INTO admin (Name, email, password)VALUES('$fullName','$email','$passwordEn')";

        if(mysqli_query($conn,$sql)) {
          
                    $sender = 'ati.student.lms@gmail.com';
 
                    $fromName = 'ATI-KANDY [Demo]'; 
                     
                    $subject = "Project Management System Lecturer [pswd]"; 
                     
                    $message = ' 
                        <html> 
                        
                        <body> 
                        Dear User,<br>
                        Please use the following password to login Your Account in Project Management System (ATI-KANDY) And Make sure Reset Your Password After loged in first time. 
                           <center> 
                                
                                <p> <h3><font size="4px" face="Arial">your Login password is :</font><br> <font color="Blue" size="5px" face="Arial"><b> ' .$password. ' </b></font> </h3></p>
                                 
                           </center>
                             click here to website : http://localhost/Main_Pro/index.php
                        </body> 
                        </html>'; 
                     
                    // Set content-type header for sending HTML email 
                    $headers = "MIME-Version: 1.0" . "\r\n"; 
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                     
                    // Additional headers 
                    $headers .= 'From: '.$fromName.'<'.$sender.'>' . "\r\n"; 

                     
                    if (mail($email, $subject, $message, $headers)) {
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Editor Added!");'; 
                       
                        echo '</script>';
                    } 
        }
       // else{
        //   echo "Data Not updtaed";
        //}

    }








 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Editor dashboard</title>
</head>

    <style type="text/css">
      body {
      align-items: center;
      background-color: #fff;
      display: flex;
      justify-content: center;
      height: 100vh;
    }

    .form {
      background-color: #15172b;
      border-radius: 20px;
      box-sizing: border-box;
      height: 520px;
      padding: 20px;
      width: 520px;
    }

    .title {
      color: #eee;
      font-family: sans-serif;
      font-size: 30px;
      font-weight: 600;
      margin-top: 30px;
    }

    .subtitle {
      color: #eee;
      font-family: sans-serif;
      font-size: 16px;
      font-weight: 600;
      margin-top: 10px;
    }

    .input-container {
      height: 50px;
      position: relative;
      width: 100%;
    }

    .ic1 {
      margin-top: 40px;
    }

    .ic2 {
      margin-top: 30px;
    }

    .input {
      background-color: #303245;
      border-radius: 12px;
      border: 0;
      box-sizing: border-box;
      color: #eee;
      font-size: 18px;
      height: 100%;
      outline: 0;
      padding: 4px 20px 0;
      width: 100%;
    }

    .cut {
      background-color: #15172b;
      border-radius: 10px;
      height: 20px;
      left: 20px;
      position: absolute;
      top: -20px;
      transform: translateY(0);
      transition: transform 200ms;
      width: 76px;
    }

    .cut-short {
      width: 50px;
    }



    .input:focus ~ .cut,
    .input:not(:placeholder-shown) ~ .cut {
      transform: translateY(8px);
    }

    .placeholder {
      color: #65657b;
      font-family: sans-serif;
      left: 20px;
      line-height: 14px;
      pointer-events: none;
      position: absolute;
      transform-origin: 0 50%;
      transition: transform 200ms, color 200ms;
      top: 20px;
    }

    .input:focus ~ .placeholder,
    .input:not(:placeholder-shown) ~ .placeholder {
      transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:placeholder-shown) ~ .placeholder {
      color: #808097;
    }

    .input:focus ~ .placeholder {
      color: #dc2f55;
    }

    .submit {
      background-color: #08d;
      border-radius: 12px;
      border: 0;
      box-sizing: border-box;
      color: #eee;
      cursor: pointer;
      font-size: 18px;
      height: 50px;
      margin-top: 38px;
      // outline: 0;
      text-align: center;
      width: 100%;
    }

    .submit:active {
      background-color: #06b;
    }

.btn-4 {
  background-color: #FB8122;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #1D2228;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 38px;
  // outline: 0;
  text-align: center;
  width: 10%;

  margin: 0;
  position: absolute;
  top: 7%;
  left: 82%;
}
.btn-5 {
  background-color: #0F2557;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 38px;
  // outline: 0;
  text-align: center;
  width: 10%;

  margin: 0;
  position: absolute;
  top: 7%;
  left: 5%;
}


  </style>



<body>
 <a href="showLecturers.php"> <button name="show" class="btn-4">Show Lecturer list</button> </a>
<a href="editor_home.php"> <button name="show" class="btn-5">Go to Home</button> </a> <br><br>

<form method="POST" action="addNewLecturer.php">
    <div class="form">
      <div class="title">Welcome to Add New Lecturer page</div>
      <div class="subtitle">In here You can add New Lecturers</div>
      <div class="input-container ic1">
        <input id="firstname" name="FName" class="input" type="text" placeholder=" " />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Full Name</label>
      </div>
     
      <div class="input-container ic2">
        <input id="email" name="email_E" class="input" type="email" placeholder=" " />
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</>
      </div>
      
      <div class="input-container ic2">
        <input id="password" name="password_E" class="input" type="password" placeholder=" " />
        <div class="cut "></div>
        <label for="password" class="placeholder">Password</>
      </div>

      <button type="text" class="submit" name="submit">submit</button>
    </div>
</form>
</body>
</html>