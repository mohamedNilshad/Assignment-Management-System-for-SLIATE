<?php

include 'upload.php';

$servername = "localhost";
$username = "root";
$password = "";
$db="project_management";



$conn = mysqli_connect($servername, $username, $password,$db);
if(isset($_POST["submit"]))
{
    $memberId = $_SESSION['userId'];

    //$CourseName=$_POST["course"];
    $CourseId = '1';

    //$SubCode=$_POST["subcode"];
    $subId = '1';

    //$Lecture=$_POST["lecture"];
    $adminId = '1';
    $pname = rand(1,1000)."-".$_FILES['file']['name'];
    $tname = $_FILES['file']['tmp_name'];
    $folder="proj/";

    move_uploaded_file($tname,$folder.'/'.$pname);

    $RegNo = $_SESSION['regNum'];

    $sql="INSERT INTO project (member_id,course_id,sub_id,admin_id,Files)VALUES('$memberId','$CourseId','$subId','$adminId ','$pname')";

    if(mysqli_query($conn,$sql))
    {
        

        //echo $_SESSION['regNum'];
        //header("location:view.php");

        $query = "SELECT member.name, member.reg_num, member.email, files FROM project INNER JOIN member ON project.member_id = member.id  where admin_id ='1' ORDER BY project.id DESC";
        $result = $conn->query($query);
        $i=1;
        while($row = $result->fetch_assoc()) 
        {

                ?>
        <table border="4" align="center">
            <tr>
                <td> Name &emsp;&emsp;</td>
                <td><?php echo $row["name"]; ?></td>&emsp;
            </tr>
            <tr>
                <td>Register Number &emsp;&emsp;</td>
                <td><?php echo $row["reg_num"]; ?></td>&emsp;

            </tr>
            <tr>
                <td>Email id &emsp;&emsp;</td>
                <td><?php echo $row["email"]; ?></td>&emsp;

            </tr>
            <tr>
                <td><a href="proj/<?php echo $row['files'] ?>" target="_blank">view file</a></td>
                <td><?php echo $row["files "]; ?></td>&emsp;

            </tr>
            </table>
            <?php
            $i++;

            }
            ?>
            </table>
        </body>
        </html> 


   <?php  
      
    }
    else
    {
        echo "Datas not inserted";
    }
     
      
      
}

?>
