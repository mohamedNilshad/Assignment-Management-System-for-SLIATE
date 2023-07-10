<?php 
   include_once 'config.php'; 
    
    //echo "$_SNo";

if(isset($_POST["submit"]))
{

    $stuId = $_POST['stId'];
    //echo $stuId;

    $conPass = $_POST['Cpassword'];

    $Nemail = $_POST['newEmail'];

             $sqlpass1 = $conn->query("SELECT pass FROM member WHERE id = '$stuId'");
             $dataPass1 = $sqlpass1->fetch_assoc();

             $oldPass1 = $dataPass1['pass'];
                    
            if(md5($conPass) == $oldPass1){

                $sqlNew= "UPDATE member SET email ='$Nemail' WHERE id = '$stuId'";
                    if (mysqli_query($conn, $sqlNew)) {

                     echo '<script>alert("Email Updated successfully !")</script>';
                   
                      //header("location: m_main.php");
            
 

                    } else {
                      echo  $conn->error;
                    }

            }else{
                echo '<script>alert("Password Dosent matched")</script>';

               
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
        <h2>Change Email</h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
        <form action="changeEmail.php" method="POST" autocomplete="off">
          
            <label>Enter New Email : </label>
            <input type="email" name="newEmail" required ><br>

            <label>Confirm Password(Not Email Password!) : </label>
            <input type="password" name="Cpassword" required>

            <input type="hidden" id="stId" name="stId" value= "<?php echo $_SNo = $_GET['data'];?>" >
            <input type="submit" name="submit" >
        </form>
    </div>
</body>

</html>