 <?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db="project_management";

  $conn = mysqli_connect($servername, $username, $password,$db);

  if(isset($_POST["submit"]))
    {
              
        
        $email = $_POST['email_E']; 

        $password = $_POST['password_E']; 


        $passwordEn = md5($password);

        echo $passwordEn;

        $s = "SELECT * FROM editor WHERE email = '$email' AND password = '$passwordEn' AND showMe = '0' ";
        $result = mysqli_query($conn, $s);
      
        $num = mysqli_num_rows($result);
      
        if($num == 1){
          header("location: editor_home.php");  
        }
        else{
          echo '<script type="text/javascript">'; 
          echo 'alert("incorrect email or Password!");'; 
          echo 'window.location.href = "editor.php";';
          echo '</script>';
        }




    }








 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Editor Login</title>
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
      height: 370px;
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



  </style>



<body>

<form method="POST" action="editor.php">
    <div class="form">
      <div class="title">Welcome to Login page</div>
  
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

      <button type="text" class="submit" name="submit">Log in</button>
    </div>
</form>
</body>
</html>