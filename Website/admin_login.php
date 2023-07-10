<?php

session_start();
	
					$con = mysqli_connect('localhost','root', '');		
					mysqli_select_db($con,'project_management');

				
				if(isset($_POST['login'])){
					$email = $_POST['a_email'];
					$pass = $_POST['a_pass'];

						$pass = md5($_POST['a_pass']);

						$s = " SELECT * FROM admin WHERE email = '$email' AND password= '$pass' AND showMe = '0' ";
						$result = mysqli_query($con, $s);

						$num = mysqli_num_rows($result);

						$_SESSION['userId'] = 0;
						$_SESSION['email'] = $email;
						
						if($num == 1){

							$_SESSION['email'] = $email;
							header("location: a_main.php");
							//echo "loged in";
							
						}
						else{
								echo '<script type="text/javascript">'; 
								echo 'alert("Password or Email Doesnt match or Admin May be Blocked You");'; 
								echo 'window.location.href = "admin.html";';
								echo '</script>';
								echo "error in login";
						}
					
					}
	


?>