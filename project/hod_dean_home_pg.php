<?php

	session_start() ;

  	include('dbms_connect.php') ;

  	error_reporting(0) ;

  	$faculty_id = $_SESSION['faculty_id'] ;
	$designation = $_SESSION['designation'] ;
	$dept = $_SESSION['dept'] ;

	# Leaves that the HOD/Dean applies for
  	$query = "SELECT * FROM leave_app WHERE facultyID = '$faculty_id'" ; 
    $data = mysqli_query($conn, $query);
    $all_leave_ids = mysqli_fetch_all($data, MYSQLI_ASSOC);

  	# Leaves that the HOD/DeanFA can see of faculty
  	if ($designation == "DEANFA"){
  		$sql_query = "SELECT * FROM dean_fa" ;
  		$rows = mysqli_query($conn, $sql_query);
  		$leave_id_facs = mysqli_fetch_all($rows, MYSQLI_ASSOC);
  	}
  	else if ($designation == "HOD"){
  		if ($dept == "CSE"){
  			$sql_query_2 = "SELECT * FROM hod_cse" ;
	  		$rows = mysqli_query($conn, $sql_query_2);
	  		$leave_id_facs = mysqli_fetch_all($rows, MYSQLI_ASSOC);
  		}
  		else if ($dept == "EE"){
  			$sql_query_3 = "SELECT * FROM hod_ee" ;
	  		$rows = mysqli_query($conn, $sql_query_3);
	  		$leave_id_facs = mysqli_fetch_all($rows, MYSQLI_ASSOC);
  		}
  		else{
  			$sql_query_4 = "SELECT * FROM hod_me" ;
	  		$rows = mysqli_query($conn, $sql_query_4);
	  		$leave_id_facs = mysqli_fetch_all($rows, MYSQLI_ASSOC);
  		}
  	}

  	$sql_query = "SELECT * from faculty where facultyID = '$faculty_id'" ;
    $result = mysqli_query($conn, $sql_query) ;
    $data = mysqli_fetch_array($result);
    $total_leaves = $data['total_leaves'];
    $left_leaves = $data['left_leaves'];
    $faculty_name = $data['name'];
    $leaves_taken = $total_leaves - $left_leaves ;



 ?>

<!DOCTYPE html>
<html>
<title>HoD/Dean Home Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

</style>


<body class="w3-light-grey">

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white" style="letter-spacing:4px;">
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button">Logout</a>
    </div>
    <div class="w3-right w3-hide-small">
      <a href="phase2/view_profile_own.php" class="w3-bar-item w3-button">Profile Page</a>
    </div>
  </div>
</div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">


<div class="w3-col s8 w3-bar" style="padding-left:15px">
	<h2>Welcome <strong><?php echo htmlspecialchars($faculty_name);?></strong></h2>
</div>


  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-third">
    <div style="background-color: lightgray">
      <div class="w3-container w3-padding-10">
        <div class="w3-right">
          <h4>Total Leaves</h4>
      	</div>
        <div class="w3-clear"></div>
          <div class="w3-right">
            <h3><?php echo htmlspecialchars($total_leaves);?></h3>
          </div>
        </div>
      </div>
    </div>
  
    <div class="w3-third">
    <div style="background-color: gray">
      <div class="w3-container w3-padding-10">
        <div class="w3-right">
        <div style="font-color: white">
          <h4>Leaves Taken</h4>
        </div>
        <div class="w3-clear"></div>
        <div class="w3-right">
        <h3><?php echo htmlspecialchars($leaves_taken);?></h3>
        </div>
        </div>
      </div>
      </div>
    </div>
    <div class="w3-third">
      <div class="w3-container w3-black w3-padding-10">
        <div class="w3-right">
          <h4>Leaves Left</h4>
        </div>
        <div class="w3-clear"></div>
        <div class="w3-right">
        <h3><?php echo htmlspecialchars($left_leaves);?></h3>
        </div>
      </div>
    </div>
  </div>
  
  <div class="w3-row-padding">
  <div class="w3-half">
  <header class="w3-container">
    <h5><b><i class="fa fa-check"></i> Check Application Status</b></h5>
  </header>
  <form class="w3-container" action="#" method="post">
      <label> Select Leave ID:</label>
      <select class="w3-select" name="option1" required>
      <option value="" disabled selected>Choose your option</option>
      <?php foreach($all_leave_ids as $leave_ids): ?>
        <option value="<?php echo htmlspecialchars($leave_ids['leaveID']); ?>"><?php echo htmlspecialchars($leave_ids['leaveID']); ?></option>
      <?php endforeach; ?>
    </select>
    
    <p><button type="submit" name="my_application" class="w3-btn w3-green">Submit</button></p> 
    </form>
  </div>
  
  <div class="w3-half">
  <div class="w3-vertical-half">
  <header class="w3-container">
    <h5><b><i class="fa fa-plus"></i> Apply for a Leave</b></h5>
  </header>
  <a href="application_pg.php" class="w3-button w3-block w3-left-align w3-white">Go to Application Page</a>
  </div>
  
  <div class="w3-vertical-half">
  <header class="w3-container" style="padding-top: 15px">
    <h5><b><i class="fa fa-bell"></i> Pending Faculty Leaves</b></h5>
  </header>
  <form class="w3-container" action="#" method="post">
      <label> Select Leave ID:</label>
      <select class="w3-select" name="option2" required>
      <option value="" disabled selected>Choose your option</option>
      <?php foreach($leave_id_facs as $leave_ids): ?>
        <option value="<?php echo htmlspecialchars($leave_ids['leaveID']);?>"><?php echo htmlspecialchars($leave_ids['leaveID']);?></option>
      <?php endforeach; ?>
    </select>
    
    <p><button type="submit" name="faculty_application" class="w3-btn w3-green">Submit</button></p> 
    </form>
  </div>
   <!-- End page content -->
</div>
</body>
</html>

<?php

  if(isset($_POST['my_application'])){

    $leave_id = $_POST['option1'] ;
    $_SESSION['leave_id'] = $leave_id ;
    header('location:leave_faculty_pg.php') ;

  }
  else if(isset($_POST['faculty_application'])){

    $leave_id = $_POST['option2'] ;
    $_SESSION['leave_id'] = $leave_id ;
    header('location:leave_authority_pg.php') ;

  }

 ?>
