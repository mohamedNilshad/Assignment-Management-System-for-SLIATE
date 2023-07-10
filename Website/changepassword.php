<?php 
   include_once 'config.php'; 
    
    //echo "$_SNo";

if(isset($_POST["submit"]))
{

    $stuId = $_POST['stId'];
    //echo $stuId;

    $cPass = $_POST['current_password'];

    $Npass1 = md5($_POST['new_password']);

             $sqlpass = $conn->query("SELECT pass FROM member WHERE id = '$stuId'");
             $dataPass = $sqlpass->fetch_assoc();

             $oldPass = $dataPass['pass'];
                    
            if(md5($cPass) == $oldPass ){

                $sqlNew= "UPDATE member SET pass ='$Npass1' WHERE id = '$stuId'";
                    if (mysqli_query($conn, $sqlNew)) {

                     echo '<script>alert("Password Updated successfully !")</script>';
                   
                      //header("location: m_main.php");
            
            //header ('Location:s_apply2.php');





                    } else {
                      echo  $conn->error;
                    }

            }else{
                echo '<script>alert("Enterd Password doesnt match with old password !!")</script>';

                //echo "Enterd Password doesn't match with old password !!";
            }


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgot.css">
</head>

<body>
    <div id="container">
        <h2>Change Password</h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
        <form action="changepassword.php" method="POST" autocomplete="off">
          
            <label>Current Password : </label>
            <input type="password" name="current_password" required ><br>

            <label>New Password : </label>
            <input type="password" name="new_password" required  pattern=".{8,}" title="Eight or more characters">

            <input type="hidden" id="stId" name="stId" value= "<?php echo $_SNo = $_GET['data'];?>" >
            <input type="submit" name="submit" >
        </form>
    </div>
</body>

</html>