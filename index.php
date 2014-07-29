<html>

<?php
	include ('./navbar.html');
?>

<?php
	include ('./cantorsqlitedb.php');
?>

<div class="row">
  <div class="col-md-4 col-md-offset-1">
  <h3>Enter New Comment Card</h3>
  <br>
  <div class="alert alert-warning" role="alert" id="alert_message" style="display:none"></div>
  <br>
  <br>
  <form role="form" method="POST">
    <div class="form-group">
      <label for="dateinput">Date of Visit</label>
	     <input class="form-control" id="dateinput" type="date" name="date">
    </div>
    <div class="form-group">
      <label for="nameinput">Name</label>
      <input class="form-control" type="text" id="nameinput" name="name">
	   </div>
    <div class="form-group">
      <label for="telephoneinput">Phone #</label>
      <input class="form-control" type="tel" id="telephoneinput" name="telephone">
	   </div>
    <div class="form-group">
      <label for="emailinput">Email</label>
      <input class="form-control" type="email" id="emailinput" name="email">
	   </div>
    <div class="form-group">	  
      <label for="commentinput">Comment</label>
      <textarea rows="5" class="form-control" id="commentinput" name="comment"></textarea>
    </div>	  
    <div class="form-group">
      <label for="statusinput">Status</label>
      <select class="form-control" id="statusinput" name="status">
        <option>No action necessary</option>
        <option>Action required</option>
        <option>Contact visitor</option>
        <option>Issue solved</option>
        <option>In progress</option>
      </select>
    </div>
    <div class="form-group">
      <label for="departmentinput">Department</label>
      <select class="form-control" id="departmentinput" name="department">
        <option>Administration</option>
        <option>Operations</option>
        <option>Curatorial Staff</option>
        <option>Curatorial Assistants</option>
        <option>Education Staff</option>
        <option>External Relations Staff</option>
        <option>Collections</option>
        <option>Art Preparotors</option>
        <option>Rights and Reproductions</option>
        <option>CAC Internal (Administration)</option>
        <option>Security</option>
      </select>
    </div>
    <div class="form-group">
      <label for="catergoryinput">Category</label>
      <select class="form-control" id="catergorytinput" name="category">
        <option>Parking</option>
        <option>Exhibition</option>
        <option>Bookstore</option>
        <option>Compliments</option>
        <option>E-News</option>
        <option>Building Issues</option>
        <option>Security</option>
        <option>Business</option>
        <option>Maps/Direction</option>
        <option>Docents</option>
        <option>Cafe</option>
        <option>Complaints</option>
        <option>Family Programs</option>
        <option>Lost and Found</option>
      </select>
    </div>
    <div class="form-group">
      <label for="assigneeinput">Assignee</label>
      <input class="form-control" type="text" id="assigneeinput" name="assignee">
	   </div>
    <br>
    <div class="form-group">
      <label for="staffcontactinput">Staff Contacted</label>
	     <input class="form-control" id="staffcontactinput" type="date" name="staffcontactdate">
    </div>
    <div class="form-group">
      <label for="stafffollowupinput">Staff Followed Up</label>
	     <input class="form-control" id="stafffollowupinput" type="date" name="stafffollowupdate">
    </div>
    <button type="submit" class="btn btn-default">Log Comment</button>
  </form>
  </div>
</div>


<?php	
	 error_reporting();
  if($_POST["comment"]) {
    $date = $_POST["date"];
    $commenttext = $_POST["comment"];
    $name = $_POST["name"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $status = $_POST["status"];
    $department = $_POST["department"];
    $category = $_POST["category"];
    $assignee = $_POST["assignee"];
    $contact_date = $_POST["staffcontactdate"];
    $follow_up_date = $_POST["stafffollowupdate"];
    $query = "insert into Comments(Date, CommentText, Name, Telephone, Email, Status, Department, Category, Assignee, ContactDate, FollowUpDate) values( \"" . $date . "\", \"" . $commenttext . "\", \"" . $name . "\", \"". $telephone . "\", \"" . $email . "\", \"" . $status . "\", \"" . $department . "\", \"" . $category . "\", \"" . $assignee . "\", \"" . $contact_date . "\", \"" . $follow_up_date . "\")";
    try {
      $db->beginTransaction();
      $result = $db->query($query);
      $db->commit();
      //send notification to assigned person
	  include ('./mail_notification.php');
    } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
    $db = null;
  } else if(isset($_POST["comment"]) and "" == trim($_POST["comment"])) {
	echo '<script type="text/javascript">';
	echo 'alert_div = document.getElementById("alert_message");';
	echo 'alert_div.style.display="initial";';
	echo 'alert_div.innerHTML = "Please enter TEXT";';
	
	echo '</script>';
  }
?>
</body>
</html>

