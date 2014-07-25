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
  if($_GET["commentID"]) {
    $commentID = $_GET["commentID"];
    try {
      $db->beginTransaction();
      $query = "Select * from Comments where CommentID=" . $commentID;
      $result = $db->query($query);
      $row = $result->fetch();
      $date = $row["Date"];
      $name = $row["Name"];
      $status = $row["Status"];
      $comment = $row["CommentText"];
      $telephone = $row["Telephone"];
      $email = $row["Email"];
      $assignee = $row["Assignee"];
      $department = $row["Department"];
      $contact_date = $row["ContactDate"];
      $follow_up_date = $row["FollowUpDate"];
      $category = $row["Category"];
      echo "<div class=\"row\">";
      echo "<div class=\"col-md-4\">";
      echo "<strong>Vistor info</strong>";
      echo "<p>" . $name . "</p>";
      echo "<p>" . $email . "</p>";
      echo "<p>" . $telephone . "</p>";
      echo "</div>";
      echo "<div class=\"col-md-2\">";
      echo "<strong>Date of visit</strong>";
      echo "<p>" . $date . "</p>";
      echo "<strong>Status</strong>";
      echo "<p>" . $status . "</p>";
      echo "<strong>Staff Contacted</strong>";
      echo "<p>" . $contact_date . "</p>";
      echo "</div>";
      echo "<div class=\"col-md-2\">";
      echo "<strong>Department</strong>";
      echo "<p>" . $department . "</p>";
      echo "<strong>Category</strong>";
      echo "<p>" . $category . "</p>";
      echo "<strong>Assigned</strong>";
      echo "<p>" . $assignee . "</p>";
      echo "<strong>Staff Followed Up</strong>";
      echo "<p>" . $follow_up_date . "</p>";
      echo "</div>";
      echo "</div>";
      echo "<div class=\"row\">";
      echo "<div class=\"col-md-6\">";
      echo "<strong>Comment</strong>";
      echo "<p>". $comment . "</p>";
      echo "</div>";
      echo "</div>";
      echo "
        <div class=\"row\">
        <br>
        <div class=\"col-md-4\">
        <form role=\"form\" method=\"GET\" action=\"edit_comment.php\">
          <input type=\"hidden\" name=\"commentID\" value=\"" . $commentID . "\"/> 
          <button type=\"submit\" class=\"btn btn-default\">Edit</button>
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

