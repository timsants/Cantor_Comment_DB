<html>

<head>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
	include ('./navbar.html');
?>

<?php
	include ('./cantorsqlitedb.php');
?>


<div class="content">

<?php	
	 error_reporting();
  if(isset($_POST["comment"]) and "" != trim($_POST["comment"])) {
    $commentID = $_POST["commentID"];
    $date = $_POST["date"];
    $commenttext = $_POST["comment"];
    $name = $_POST["name"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $status = $_POST["status"];
    $department = $_POST["department"];
    $category = $_POST["category"];
    $assignee = $_POST["assignee"];
    $assignee_email = $_POST["assignee_email"];
    $contact_date = $_POST["contact_date"];
    $follow_up_date = $_POST["follow_up_date"];
    $staffResponse = $_POST["staffResponse"];
    $query = "update Comments set Date=\"" . $date . "\", CommentText=\"" . 
    			$commenttext . "\", Name=\"" . $name . "\", Telephone=\"". 
    			$telephone . "\", Email=\"" . $email . "\", Status=\"" . 
    			$status . "\", Department=\"" . $department . "\", Category=\"" . 
    			$category . "\", Assignee=\"" . $assignee . "\", AssigneeEmail=\"" . 
    			$assignee_email . "\", ContactDate=\"" . $contact_date . 
    			"\", FollowUpDate=\"" . $follow_up_date . "\", StaffResponse=\"" . 
       $staffResponse . "\" where CommentID=" . $commentID;
    try {
      $db->beginTransaction();
      $result = $db->query($query);
      $db->commit();
      echo '<div class="alert alert-success" role="alert" id="alert_message_success">
      		Changes successfully saved</div>';
    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
  } else if (isset($_POST["delete"])) {
  	$commentID = $_POST["commentID"];
    $query = "delete from Comments where CommentID=" . $commentID;
    try {
    	$db->beginTransaction();
       	$result = $db->query($query);
       	$db->commit();
       	echo '<div class="alert alert-success" role="alert" id="alert_message_success">
      		Comment successfully deleted</div>';
      
     } catch (Exception $e) {
       	echo 'Caught exception: ',  $e->getMessage(), "\n";
	 }
     	exit;
  }
?>

<?php
  if($_GET["commentID"]) {
    $commentID = $_GET["commentID"];
    try {
      $db->beginTransaction();
      $query = "Select * from Comments where CommentID=" . $commentID;
      $result = $db->query($query);
      $row = $result->fetch();
      $db->commit();
      $date = $row["Date"];
      $name = $row["Name"];
      $status = $row["Status"];
      $comment = $row["CommentText"];
      $telephone = $row["Telephone"];
      $email = $row["Email"];
      $assignee = $row["Assignee"];
      $assignee_email = $row["AssigneeEmail"];
      $department = $row["Department"];
      $contact_date = $row["ContactDate"];
      $follow_up_date = $row["FollowUpDate"];
      $category = $row["Category"];
      $staffResponse = $row["StaffResponse"];
      echo "<form role=\"form\" method=\"POST\">";
      echo "<br><input type=\"hidden\" name=\"commentID\" value=\"" . $commentID . "\">";
      echo "<div class=\"row\">";
      echo "<div class=\"col-md-4\">";
      echo "<strong>Vistor info</strong>";
      echo "<br><input type=\"text\" name=\"name\" value=\"" . $name . "\">";
      echo "<br><strong>Email</strong>";
      echo "<br><input type=\"text\" name=\"email\" value=\"" . $email . "\">";
      echo "<br><strong>Telephone #</strong>";
      echo "<br><input type=\"text\" name=\"telephone\" value=\"" . $telephone . "\">";
      echo "</div>";
      echo "<div class=\"col-md-2\">";
      echo "<strong>Date of visit</strong>";
      echo "<br><input type=\"date\" name=\"date\" value=\"" . $date . "\">";
      echo "<br><strong>Status</strong>";
      $statuses = array("No action necessary", "Action required", "Contact visitor", "Issue solved", "In progress");
      echo "<br><select name=\"status\">";
      foreach ($statuses as $stat) {
        if ($status == $stat)
        {
        	echo "<option selected=\"selected\" value=\"" . $stat . "\">" . $stat . "</option>";
        } else {
      		echo "<option value=\"" . $stat . "\">" . $stat . "</option>";
      	}
      }
      echo "</select>";
      echo "<br><strong>Staff Contacted</strong>";
      echo "<br><input type=\"date\" name=\"contact_date\" value=\"" . $contact_date . "\">";
      echo "<br><strong>Staff Followed Up</strong>";
      echo "<br><input type=\"date\" name=\"follow_up_date\" value=\"" . $follow_up_date . "\">";
      echo "</div>";
      echo "<div class=\"col-md-2\">";
      echo "<strong>Department</strong>";
      $departments = array("Administration", "Operations", "Curatorial Staff", 
      					"Curatorial Assistants", "Education Staff", 
      					"External Relations Staff", "Collections", "Art Preparotors", 
      					"Rights and Reproductions", "CAC Internal (Administration)", 
      					"Security");
      echo "</br><select name=\"department\">";
      foreach ($departments as $dep) {
        if ($department == $dep)
        {
        	echo "<option selected=\"selected\" value=\"" . $dep . "\">" . $dep . "</option>";
        } else {
      		echo "<option value=\"" . $dep . "\">" . $dep . "</option>";
      	}
      }
      echo "</select>";
      echo "</br><strong>Category</strong>";
      $categories = array("Parking", "Exhibition", "Bookstore", "Compliments", "E-News", 
      					"Building Issues", "Security", "Business", "Maps/Direction", 
      					"Docents", "Cafe", "Complaints", "Family Programs", 
      					"Lost and Found");
      
      echo "</br><select name=\"category\">";
      foreach ($categories as $cat) {
        if ($category == $cat)
        {
        	echo "<option selected=\"selected\" value=\"" . $cat . "\">" . $cat . "</option>";
        } else {
      		echo "<option value=\"" . $cat . "\">" . $cat . "</option>";
      	}
      }
      echo "</select>";
      echo "</br><strong>Assigned</strong>";
      echo "</br><input type=\"text\" name=\"assignee\" value=\"" . $assignee . "\">";
      
      echo "</br><strong>Assignee Email</strong>";
      echo "</br><input type=\"text\" name=\"assignee_email\" value=\"" . $assignee_email . "\">";
      
      echo "</div>";
      echo "</div>";
      echo "<div class=\"row\">";
      echo "<div class=\"col-md-4\">";
      echo "<strong>Visitor's Comment</strong>";
      echo "</br><textarea rows=\"5\" cols=\"40\" name=\"comment\">" . $comment . "</textarea>";
      echo "</div>";
      echo "<div class=\"col-md-4\">";
      echo "<strong>CAC Staff Response</strong>";
      echo "</br><textarea rows=\"5\" cols=\"40\" name=\"staffResponse\">" . $staffResponse . "</textarea>";
      echo "</div>";
      echo "</div>";
      echo "
        <div class=\"row\">
        <br>
        <div class=\"col-md-4\">
          <input type=\"hidden\" name=\"commentID\" value=\"" . $commentID . "\"/> 
          <button type=\"submit\" class=\"btn btn-default\">Save</button>
        </div>
        </form>
        <form role=\"form\" method=\"POST\">
          <input type=\"hidden\" name=\"commentID\" value=\"" . $commentID . "\"/> 
          <input type=\"hidden\" name=\"delete\"/> 
          <button type=\"submit\" class=\"btn btn-default\" value=\"delete\">Delete</button>
        </form>
        </div>";
    } catch (Exception $e) {
      echo "<h3>Exception" . $e . "</h3>";
    }
  } else {
    header('Location: http://cgi.stanford.edu/~tsantos/view_comments.php');
  }

?>


</div>



</body>
</html>
