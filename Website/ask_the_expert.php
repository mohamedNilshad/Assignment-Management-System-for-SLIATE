<?php

include 'validation.php';


 $reg_number = $_SESSION['reg_num'];
 $sql12 = $con->query("SELECT id FROM member where reg_num = '$reg_number'");
 $data12 = $sql12->fetch_assoc();

//getting corse and year from reg number
    $myString = "$reg_number";

    $strArray = explode('/',$myString);
    $corse_Name = $strArray[1];
    $b_year = $strArray[2];
    $c_type = $strArray[3];


        if($corse_Name == 'IT'){ $course_id = 4;}
        else if($corse_Name == 'M'){$course_id = 2;}
        else if($corse_Name == 'A'){$course_id = 3;}
        else if($corse_Name == 'BA'){$course_id = 6;}
        else if($corse_Name == 'THM'){$course_id = 5;}
        else if($corse_Name == 'E'){$course_id = 1;}


        if($c_type == 'F'){
            $ctype = "FULL TIME";

        }else{
            $ctype = 'PART TIME';
        }


$url = $_SERVER['REQUEST_URI'];




$loggedIn = false;


$conn = new mysqli('localhost', 'root', '', 'project_management');

function createCommentRow($data) {
    global $conn;

    $response = '
                <div class="comment">
                    <div class="user">'.$data['name'].' <span class="time">'.$data['createdOn'].'</span></div>
                    <div class="userComment">'.$data['comment'].'</div>
                    <div class="reply"><a href="javascript:void(0)" data-commentID="'.$data['id'].'" onclick="reply(this)">REPLY</a></div>

                    <div class="replies">';
            //if not worked remove AND replies.id != 'R0'
    $sql = $conn->query("SELECT replies.id, name, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN member ON replies.memberId = member.id WHERE replies.commentID = '".$data['id']."' AND replies.id != 'R0' AND show_comment = '0' ORDER BY replies.id DESC ");

    while($data = $sql->fetch_assoc())
        $response .= createCommentRow($data);

    $response .= '
                        </div>
            </div>
        ';

    return $response;
}

if (isset($_POST['getAllComments'])) {

    $start = $conn->real_escape_string($_POST['start']);

    $response = "";
    $sql = $conn->query("SELECT comments.id, name, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN member ON comments.memberId = member.id WHERE show_comment = '0' ORDER BY comments.id DESC ");
    while($data = $sql->fetch_assoc())
        $response .= createCommentRow($data);

    exit($response);
}

if (isset($_POST['addComment'])) {
    $comment = $conn->real_escape_string($_POST['comment']);
    $isReply = $conn->real_escape_string($_POST['isReply']);
    $commentID = $conn->real_escape_string($_POST['commentID']);

    if ($isReply != 'false') {

                    //if doesnt work remove this parts
                    //-----------------------------------------------------------------------------------

                    $sqlID = mysqli_query($conn, "SELECT id FROM replies ORDER BY id DESC LIMIT 1");
                    $rID = mysqli_fetch_row($sqlID);

                    //array to string convert
                    $strID = implode(" ",$rID);

                    //remove R
                    $strID = ltrim($strID, 'R');
                    
                    //remove R
                    $strID = $strID +1;
                    

                    $comID = "R".$strID;

        //-----------------------------------------------------------------------------------


        $conn->query("INSERT INTO replies (id, comment, commentID, memberId, createdOn, show_comment, delete_id) VALUES ('$comID', '$comment', '$commentID', '".$_SESSION['userId']."',NOW(),0,0)");

        $sql = $conn->query("SELECT replies.id, name, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN member ON replies.memberId = member.id WHERE show_comment = '0' ORDER BY replies.id DESC");
    } else {
        $conn->query("INSERT INTO comments (memberId, comment, createdOn, show_comment, delete_id) VALUES ('".$_SESSION['userId']."','$comment',NOW(),0,0)");
         

       

        $sql = $conn->query("SELECT comments.id, name, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN member ON comments.memberId = member.id WHERE show_comment = '0' ORDER BY comments.id DESC");
    }

    $data = $sql->fetch_assoc();
    exit(createCommentRow($data));
}



	$sqlNumComments = "SELECT id FROM comments WHERE show_comment = '0'";
			
	if ($result3=mysqli_query($con,$sqlNumComments)) {
			$numComments=mysqli_num_rows($result3);
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="footer, address, phone, icons" />

    <title>Ask the Expert</title>
    <link rel="stylesheet" type="text/css" href="navi.css">
	<link rel="stylesheet" type="text/css" href="ask.css">

    
</head>

<style>


.comment {
            margin-bottom: 20px;
            margin-left: 40px;
        }

        .user {
            font-weight: bold;
            color: black;
            font-family : Calibri;
        }

        .time, .reply {
            color: #6E6E6E;
            font-family : Calibri;
            font-weight: bold;
        }

        .userComment {
            color: #000;
        }

        .replies .comment {
            margin-top: 20px;

        }

        .replies {
            margin-left: 5px;
            font-family : Calibri;
            
        }
  
#log    {
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

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: wight;
  color: white;
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
                <a href="changepassword.php?data= <?php echo  $data12['id']; ?>" ><font color="#394F8A">Change Password</font></a>
                <a href="changeEmail.php?data= <?php echo  $data12['id']; ?>"><font color="#394F8A">Change Email</font></a>
                <a href="index.php"><font color="Blue"><b>Logout</b></font></a>
              </div>
            </div>
        </th>
		
		<th width="6%">	
			<div class="navbar">
				<a href="m_main.php">Home</a>
			</div>	
		</th>
		

		<th width="10%">
			<div class="navbar">
				<a href="m_mini.php"> Mini Course</a>
			</div>	
		</th>
		
		<th width="11%">		
			<div class="navbar">
				<a class="active" href="ask_the_expert.html"> Ask the Expert </a>
			</div>	
		</th>
		
		<th width="13%">
            <ul>
              <li class="dropdown">
                <?php
                    $sql = mysqli_query($conn, "SELECT * FROM notification WHERE course_id = '$course_id' AND batch ='$b_year' AND type = '$ctype' AND status = 'unread' ");
                        $count = mysqli_num_rows($sql);
                ?>
                <a href="javascript:void(0)" class="dropbtn">Notification .<span class="w3-badge"><font color="red"><?php echo  $count; ?></font></span></a>
                <div class="dropdown-content">

                <?php
                    
                    $sql = "SELECT  sub_id, status,rdate,notify_num FROM notification  WHERE course_id = '$course_id' AND batch ='$b_year' AND type = '$ctype' ORDER BY rdate DESC"  ;
                        $result = $conn->query($sql);
                          // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $sId = $row['sub_id'];
                        $status = $row['status'];
                        $date = $row['rdate'];
                        $id = $row['notify_num'];

                        $sql1 = $con->query("SELECT SubName FROM subject where id = '$sId'");
                        $data1 = $sql1->fetch_assoc();
    
                        $cName = $data1['SubName'];

                        if($status == 'unread'){


                ?>
                  <a href='displayNoti.php?data=<?php echo $id ?>& url=<?php echo $url ?>'><font color="black"><?php echo $cName;?><br></font><font size="2px"><i><?php echo $date; ?></i></font></a>

                  <?php
                    }else if($status == 'read'){

                  ?>
                  
                    <a href='displayNoti.php?data=<?php echo $id ?>& url=<?php echo $url ?>'><font color="gray"><?php echo $cName;?><br><font size="2px"><i><?php echo $date; ?></i></font></font></a>
                 <?php
                    }
                    }
                ?>
                </div>
              </li>
            </ul>   
        </th>

        <th width="15%" align="left">
            <div class="dropdown">
             <a href="#" style="text-decoration: none;"><font color="black"> Assignment Marks</font></a>
              <div class="dropdown-content">
                <a href="marksMain.php?type= 1" ><font color="#394F8A">Subject Assignment Mark</font></a>
                <!--<a href="marksMain.php?type= 2" ><font color="#394F8A">Summary of Marks</font></a>-->
              </div>
            </div>
        </th>
		
		<th width="7%">
			<div class="navbar">
				<a href="upload.php"> <img src="images/upload_i.png" height="25px" width="25px"></a>
			</div>	
		</th>
		


		<th align="middle">
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


<!-- contant -->
<div class="commentBox">
		
				<font face= "Arial" size="5px">
					<h2><b>Any Question ?</b><h2>
				
					<div class="login-box">
						
							<div class="user-box">
								<input type="text" id="mainComment" name="comment" required="">
								<label>Ask Your Question</label>
							</div>
							<button type="reset" class="button"><b>CANCEL</b></button>
							<button class="button" onclick="isReply = false;" id="addComment"><b>ASK</b></button>
							
					</div>
				</font>

				<br>
                
				<h2 ><b id="numComments"> <?php echo $numComments ?> Questions</b></h2>

</div>	


<div class="container" >
    <div class="row">
        
            <div class="userComments">

            </div>
        
    </div>
</div>


<div class="row replyRow" style="display:none">
	<div class="login-box">
		<div class="user-box">
				<input type="text" id="replyComment" >
		</div>
				<button type="reset" class="button" onclick="$('.replyRow').hide();"><b>CANCEL</b></button>
				<button class="button" onclick="isReply = true;" id="addReply" style font-family : Cambria;
            font-size :15px;><b>REPLY</b></button>
			
	</div>
</div>

<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
    var isReply = false, commentID = 0, max = <?php echo $numComments ?>;

    $(document).ready(function () {
        $("#addComment, #addReply").on('click', function () {
            var comment;

            if (!isReply)
                comment = $("#mainComment").val();
            else
                comment = $("#replyComment").val();

            if (comment.length > 1) {
                $.ajax({
                    url: 'ask_the_expert.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        addComment: 1,
                        comment: comment,
                        isReply: isReply,
                        commentID: commentID
                    }, success: function (response) {
                        max++;
                        $("#numComments").text(max + " Comments");

                        if (!isReply) {
                            $(".userComments").prepend(response);
                            $("#mainComment").val("");
                        } else {
                            commentID = 0;
                            $("#replyComment").val("");
                            $(".replyRow").hide();
                            $('.replyRow').parent().next().append(response);
                        }
                    }
                });
            } else
                alert('Please Check Your Inputs');
        });

        

        getAllComments(0, max);
    });

    function reply(caller) {
        commentID = $(caller).attr('data-commentID');
        $(".replyRow").insertAfter($(caller));
        $('.replyRow').show();
    }

    function getAllComments(start, max) {
        if (start > max) {
            return;
        }

        $.ajax({
            url: 'ask_the_expert.php',
            method: 'POST',
            dataType: 'text',
            data: {
                getAllComments: 1,
                start: start
            }, success: function (response) {
                $(".userComments").append(response);
                getAllComments((start+20), max);
            }
        });
    }
</script>
</body>
</html>