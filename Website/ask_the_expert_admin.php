
<?php
//echo "<a href='specificAssignmentPage.php?assignName=$value2'teacherYes=$isTeacher>$value2</a>";

include 'admin_login.php';

$conn = new mysqli('localhost', 'root', '', 'project_management');
$email = $_SESSION['email'];

        $sql2 = $con->query("SELECT id FROM admin where email = '$email'");
        $data2 = $sql2->fetch_assoc();                                  
        $Admin_id= $data2['id'];
        //echo  $Admin_id;
function createCommentRow($data) {
    global $conn;

    $response = '
                <div class="comment">
                    <div class="user">'.$data['name'].' <span class="time">'.$data['createdOn'].' <a href ="ask_the_expert_admin.php? deleteid='.$data['id'].'"><i class="fa fa-trash fa-1x" aria-hidden="true" style="color:red"></i></a> </span></div> 
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


if (isset($_GET['deleteid'])) {


        $id = $_GET['deleteid'];
        //$admin_id = $_GET['adID'];
        //$admin_id = '1';
        //echo $Admin_id;

        if ($id[0]=='R') {
          $now = date("Y/m/d H:i:s");
          
          $sql = "UPDATE replies SET show_comment = '1' , delete_id = '$Admin_id', deleted_date = '$now' WHERE id='$id'";
         // $sql = "DELETE FROM replies WHERE id=$id";
          $result = mysqli_query($con,$sql);
        }else{
          $now = date("Y/m/d H:i:s");
          $sql = "UPDATE comments SET show_comment = '1' , delete_id = '$Admin_id', deleted_date = '$now' WHERE id='$id'";
          //$sql = "DELETE FROM comments WHERE id=$id";
          $result = mysqli_query($con,$sql);
        }
    
    
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


        $conn->query("INSERT INTO replies (id, comment, commentID, memberId, createdOn, show_comment, delete_id,deleted_date) VALUES ('$comID', '$comment', '$commentID', '".$_SESSION['userId']."', NOW(),0,0,'0000-00-00 00:00:00')");

        $sql = $conn->query("SELECT replies.id, name, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN member ON replies.memberId = member.id WHERE show_comment = '0'  ORDER BY replies.id DESC");

    } else {

        $conn->query("INSERT INTO comments (memberId, comment, createdOn, show_comment, delete_id,deleted_date) VALUES ('".$_SESSION['userId']."','$comment',NOW(),0,0,'0000-00-00 00:00:00')");
        $sql = $conn->query("SELECT comments.id, name, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS createdOn FROM comments INNER JOIN member ON comments.memberId = member.id ORDER BY comments.id DESC");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a class="active" href="ask_the_expert_admin.php"> Ask the Expert </a>
      </div>  
    </th>

    <th width="7%">
      <div class="navbar">
        <a  href="message.php">Message</a>
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
    

    <th>
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
                    url: 'ask_the_expert_admin.php',
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
            url: 'ask_the_expert_admin.php',
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