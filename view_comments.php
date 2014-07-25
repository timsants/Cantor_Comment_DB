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

<div class="row">

  <div class="col-md-8 col-md-offset-1">
  <form role="form" method="POST" action"view_comments.php">
    <div class="form-group">
      <label for="searchinput">Search</label>
      <input class="form-control" id="searchinput" type="text" name="search">
    </div>
    <button type="submit" class="btn btn-default">Go</button>
  </form>
  </div>

</div>

<br>
<div class="row">
<div class="col-md-8 col-md-offset-1">

<?php
  echo "<table class=\"table table-condensed table-striped\">";
  echo "<tr><th>CommentID</th><th>Date</th><th>Name</th><th>Status</th><th>More info</th></tr>";
  if($_POST["search"]) {
    try {
      $db->beginTransaction();
      $keywords = $_POST["search"];
      $table_query;
      if($keywords == NULL)
      {
        $table_query = "Select * from Comments;";
      } else {
        $table_query = "Select * from Comments where CommentText Like '%" . $keywords . "%'
        OR Name Like '%" . $keywords . "%' OR Status Like '%" . $keywords . 
        "%' OR Department Like '%" . $keywords . "%' OR Category Like '%" . $keywords . 
        "%' OR Assignee Like '%" . $keywords . "%';";
      }
      $table_result = $db->query($table_query);
      
      foreach($table_result as $row) {
        $row_id = $row["CommentID"];
        $row_date = $row["Date"];
        $row_name = $row["Name"];
        $row_status = $row["Status"];;
        echo "<tr>";
        echo "<td>" . $row_id . "</td>";
        echo "<td>" . $row_date . "</td>";
        echo "<td>" . $row_name . "</td>";
        echo "<td>" . $row_status . "</td>";
        echo "<td><a href=\"comment.php?commentID=" . $row_id . "\">View</a></td>";
        echo "</tr>";
      }
      echo "</table>";
    } catch (Exception $e) {
      echo "<h3>Query failed</h3>";
    }
  } else {
    try {
      $db->beginTransaction();
      $table_query = "Select * from Comments;";
      $table_result = $db->query($table_query);
      
      foreach($table_result as $row) {
        $row_id = $row["CommentID"];
        $row_date = $row["Date"];
        $row_name = $row["Name"];
        $row_status = $row["Status"];;
        echo "<tr>";
        echo "<td>" . $row_id . "</td>";
        echo "<td>" . $row_date . "</td>";
        echo "<td>" . $row_name . "</td>";
        echo "<td>" . $row_status . "</td>";
        echo "<td><a href=\"comment.php?commentID=" . $row_id . "\">View</a></td>";
        echo "</tr>";
      }
      echo "</table>";
    } catch (Exception $e) {
      echo "<h3>Query failed</h3>";
    }
    echo "</table>";
  }
?>
</div>
</div>

</body>

</html>

