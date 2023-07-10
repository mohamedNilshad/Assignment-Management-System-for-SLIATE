<?php

session_start();
	
					$con = mysqli_connect('localhost','root', '');		
					mysqli_select_db($con,'project_management');
					
					
					$reg = $_POST['reg'];
					$nic = $_POST['nic'];

					//$pwd = md5('$pass');

					$a = " select * from student where reg_num = '$reg' && nic_num= '$nic'";
					
					$result = mysqli_query($con, $a);

					$num = mysqli_num_rows($result);
					
					if($num == 1){
						
						//header("location: Admin/a_main.html");
						echo "loged in";
						
					}
					else{
							
							echo "error in login";
					}
					/*if($num == 1){
						
						header("location: Member/m_main.html");
						
					}
					else{
							
							echo "error in login";
					}*/
	
	


?>