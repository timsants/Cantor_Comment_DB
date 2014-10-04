<html>
<body>

<?php
	include ('./navbar.html');
?>

<?php
	include ('./cantorsqlitedb.php');
?>



<div class="col-md-8">
  <form role="form" method="POST" action"view_comments.php">
    <div class="form-group">
      <div style="float:left;"> 
      <label for="date_start">Date Filter (mm/dd/yyyy&#160 -</label>
	     <input class="form-control" id="date_start" type="date" name="date_start">
      </div>
      <div style="float:left;">
      <label for="date_end">&#160mm/dd/yyyy)</label>
	     <input class="form-control" id="date_end" type="date" name="date_end">
      </div>
    </div>
				<div style="clear:both;"></div>
				<br>
    <button type="submit" class="btn btn-default">Go</button>
  </form>
</div>

<div class="row">

  
  
<?php
    try {
      $db->beginTransaction();
						$start = $_POST["date_start"];
      $end = $_POST["date_end"];
						$date_query = NULL;
						if($start and $end) { 
						  $date_query = " WHERE Date BETWEEN '" . $start . "' AND '" . $end . "'";
						} elseif ($start) {
						  $date_query = " WHERE Date > '" . $start . "'";
						} elseif ($end) {
						  $date_query = " WHERE Date < '" . $end . "'";
						}
      $query = "Select count(*) from Comments" . $date_query . ";";
      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
				  echo "<div style=\"clear:both;\"></div>";
      echo "<h3>Total number comment cards: " . $count . "</h3>";
    } catch (Exception $e) {
      echo "<h3>Exception" . $e . "</h3>";
    }

?>

<table class="table table-condensed table-striped">
    <tr><th>Category</th><th>Number of Related Comments</th></tr>

<?php
    try {
						$start = $_POST["date_start"];
      $end = $_POST["date_end"];
						$date_query = NULL;
						if($start and $end) { 
						  $date_query = " AND Date BETWEEN '" . $start . "' AND '" . $end . "'";
						} elseif ($start) {
						  $date_query = " AND Date > '" . $start . "'";
						} elseif ($end) {
						  $date_query = " AND Date < '" . $end . "'";
						}
      //Categories
      $query = "Select count(*) from Comments Where Category = 'Parking'" . $date_query . ";";
      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $parking = $count;
      echo "<tr><td>Parking</td><td>" . $count . "</td></tr>";
      $query = "Select count(*) from Comments Where Category = 'Exhibition'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $exhibition = $count;
      echo "<tr><td>Exhibition</td><td>" . $count . "</td></tr>";
      $query = "Select count(*) from Comments Where Category = 'Bookstore'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $bookstore = $count;
      echo "<tr><td>Bookstore</td><td>" . $count . "</td></tr>";
      $query = "Select count(*) from Comments Where Category = 'Compliments'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $compliments = $count;
      echo "<tr><td>Compliments</td><td>" . $count . "</td></tr>";
      $query = "Select count(*) from Comments Where Category = 'E-News'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $e_news = $count;
      echo "<tr><td>E-News</td><td>" . $count . "</td></tr>";
      $query = "Select count(*) from Comments Where Category = 'Building Issues'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $building_issues = $count;
      echo "<tr><td>Building Issues</td><td>" . $count . "</td></tr>";
      $query = "Select count(*) from Comments Where Category = 'Security'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $security = $count;
      echo "<tr><td>Security</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Category = 'Business'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $business = $count;
      echo "<tr><td>Business</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Category = 'Maps/Direction'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $maps_direction = $count;
      echo "<tr><td>Maps/Direction</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Category = 'Docents'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $docents = $count;
      echo "<tr><td>Docents</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Category = 'Cafe'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $cafe = $count;
      echo "<tr><td>Cafe</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Category = 'Complaints'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $complaints = $count;
      echo "<tr><td>Complaints</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Category = 'Family Programs'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $family_programs = $count;
      echo "<tr><td>Family Programs</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Category = 'Lost and Found'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $lost_and_found = $count;
      echo "<tr><td>Lost and Found</td><td>" . $count . "</td></tr>";
      
      //sum of categories
      $categories_sum = $parking + $exhibition + $bookstore + $compliments + 
      $e_news + $building_issues + $security + $business + $maps_direction + 
      $docents + $cafe + $complaints + $family_programs + $lost_and_found;
      $parking = ($parking / $categories_sum) * 100;
      $exhibition = ($exhibition / $categories_sum) * 100;
      $bookstore = ($bookstore / $categories_sum) * 100;
      $compliments = ($compliments / $categories_sum) * 100;
      $e_news = ($e_news / $categories_sum) * 100;
      $building_issues = ($building_issues / $categories_sum) * 100;
      $security = ($security / $categories_sum) * 100;
      $business = ($business / $categories_sum) * 100;
      $maps_direction = ($maps_direction / $categories_sum) * 100;
      $docents = ($docents / $categories_sum) * 100;
      $cafe = ($cafe / $categories_sum) * 100;
      $complaints = ($complaints / $categories_sum) * 100;
      $family_programs = ($family_programs / $categories_sum) * 100;
      $lost_and_found = ($lost_and_found / $categories_sum) * 100;
      
    } catch (Exception $e) {
      echo "<h3>Exception" . $e . "</h3>";
    }
?>  

</table>

<script src="Chart.js"></script>
<canvas id="categoriesChart" width="400" height="400"></canvas>
<script>
  var ctx = document.getElementById("categoriesChart").getContext("2d");
  
  var data = [
	{
		value: <?php echo $parking ?>,
		color:"#F38630",
		label : 'Parking',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $exhibition ?>,
		color : "#E0E4CC",
		label : 'Exhibition',
        labelColor : 'white',
        labelFontSize : '16'
	},
	{
		value : <?php echo $bookstore ?>,
		color : "#69D2E7",
		label : 'Bookstore',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $compliments ?>,
		color : "#4D5360",
		label : 'Compliments',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $e_news ?>,
		color : "#949FB1",
		label : 'E-News',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $building_issues ?>,
		color : "#D4CCC5",
		label : 'Building Issues',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $security ?>,
		color : "#E2EAE9",
		label : 'Security',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $business ?>,
		color : "#F7464A",
		label : 'Business',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $maps_direction ?>,
		color : "#7D4F6D",
		label : 'Maps/Directions',
        labelColor : 'white',
        labelFontSize : '14'
	},
	{
		value : <?php echo $docents ?>,
		color : "#ACD13C",
		label : 'Docents',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $cafe ?>,
		color : "#3396D9",
		label : 'Cafe',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $complaints ?>,
		color : "#C49AEE",
		label : 'Complaints',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $family_programs ?>,
		color : "#DCBE45",
		label : 'Family Programs',
        labelColor : 'white',
        labelFontSize : '14'
	},
	{
		value : <?php echo $lost_and_found ?>,
		color : "#FFA375",
		label : 'Lost and Found',
        labelColor : 'white',
        labelFontSize : '15'
	}						
  ];
  
  var myNewChart = new Chart(ctx).Pie(data);
</script>

<table class="table table-condensed table-striped">
    <tr><th>Department</th><th>Number of Related Comments</th></tr>

<?php
    try {
						$start = $_POST["date_start"];
      $end = $_POST["date_end"];
						$date_query = NULL;
						if($start and $end) { 
						  $date_query = " AND Date BETWEEN '" . $start . "' AND '" . $end . "'";
						} elseif ($start) {
						  $date_query = " AND Date > '" . $start . "'";
						} elseif ($end) {
						  $date_query = " AND Date < '" . $end . "'";
						}
      $query = "Select count(*) from Comments Where Department = 'Administration'" . $date_query . ";";
      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $administration = $count;
      echo "<tr><td>Administration</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'Operations'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $operations = $count;
      echo "<tr><td>Operations</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'Curatorial Staff'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $curatorial_staff = $count;
      echo "<tr><td>Curatorial Staff</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'Curatorial Assistants'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $curatorial_assistants = $count;
      echo "<tr><td>Curatorial Assistants</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'Education Staff'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $education_staff = $count;
      echo "<tr><td>Education Staff</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'External Relations Staff'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $external_relations_staff = $count;
      echo "<tr><td>External Relations Staff</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'Collections'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $collections = $count;
      echo "<tr><td>Collections</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'Art Preparotors'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $art_preparotors = $count;
      echo "<tr><td>Art Preparotors</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'Rights and Reproductions'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $rights_and_reproductions = $count;
      echo "<tr><td>Rights and Reproductions</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'CAC Internal (Administration)'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $cac_internal = $count;
      echo "<tr><td>CAC Internal (Administration)</td><td>" . $count . "</td></tr>";
      
      $query = "Select count(*) from Comments Where Department = 'Security'" . $date_query . ";";

      $result = $db->query($query);
      $row = $result->fetch();
      $count = $row[0];
      $security = $count;
      echo "<tr><td>Security</td><td>" . $count . "</td></tr>";
      
      //sum of departments
      $departments_sum = $administration + $operations + $curatorial_staff +
      + $curatorial_assistants + $education_staff + $external_relations_staff + 
      + $collections + $art_preparotors + $rights_and_reproductions
      + $cac_internal + $security;
      
      $administration = ($administration / $departments_sum) * 100;
      $operations = ($operations / $departments_sum) * 100;
      $curatorial_staff = ($curatorial_staff / $departments_sum) * 100;
      $curatorial_assistants = ($curatorial_assistants / $departments_sum) * 100;
      $education_staff = ($education_staff / $departments_sum) * 100;
      $external_relations_staff	= ($external_relations_staff / $departments_sum) * 100;
      $collections = ($collections / $departments_sum) * 100;
      $art_preparotors = ($art_preparotors / $departments_sum) * 100;
      $rights_and_reproductions = ($rights_and_reproductions / $departments_sum) * 100;
      $cac_internal = ($cac_internal / $departments_sum) * 100;
      $security = ($security / $departments_sum) * 100;
      
      
    } catch (Exception $e) {
      echo "<h3>Exception" . $e . "</h3>";
    }
?>

</table>

 <canvas id="departmentsChart" width="400" height="400"></canvas>
<script>
  var ctx = document.getElementById("departmentsChart").getContext("2d");
  
  var data = [
	{
		value: <?php echo $administration ?>,
		color:"#F38630",
		label : 'Administration',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $operations ?>,
		color : "#DCBE45",
		label : 'Operations',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $curatorial_staff ?>,
		color : "#69D2E7",
		label : 'Curatorial Staff',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $curatorial_assistants ?>,
		color : "#4D5360",
		label : 'Curatorial Assistants',
        labelColor : 'white',
        labelFontSize : '13'
	},
	{
		value : <?php echo $education_staff ?>,
		color : "#949FB1",
		label : 'Education Staff',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $external_relations_staff ?>,
		color : "#D4CCC5",
		label : 'External Relations Staff',
        labelColor : 'white',
        labelFontSize : '13'
	},
	{
		value : <?php echo $collections ?>,
		color : "#F7464A",
		label : 'Collections',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $art_preparotors ?>,
		color : "#7D4F6D",
		label : 'Art Preparotors',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $rights_and_reproductions ?>,
		color : "#ACD13C",
		label : 'Rights and Reproductions',
        labelColor : 'white',
        labelFontSize : '12'
	},
	{
		value : <?php echo $cac_internal ?>,
		color : "#3396D9",
		label : 'CAC Internal',
        labelColor : 'white',
        labelFontSize : '15'
	},
	{
		value : <?php echo $security ?>,
		color : "#C49AEE",
		label : 'Security',
        labelColor : 'white',
        labelFontSize : '15'
	}					
  ];
  var myNewChart = new Chart(ctx).Pie(data);
</script>



      



</div>



</body>
</html>
