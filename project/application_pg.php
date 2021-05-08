<?php

	session_start() ;

  	include('dbms_connect.php') ;

  	error_reporting(0) ;


 ?>

<!DOCTYPE html>
<html>
<title>Application Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
  </div>
</div>

<div class="w3-main" style="margin-left:300px;margin-top:30px;">

<div style="padding-left: 15px">
<form class="w3-container" action="#" method="post">
    <p> 
    <div style="text-color: white">
    <div class="w3-padding-16">
      <label>Select From Date:</label>
    </div>  
    <input class="w3-input w3-border" type="date" name="from_date" required>
  	<div class="w3-padding-16">
      <label>Select To Date:</label>
    </div>
    <input class="w3-input w3-border" type="date" name="to_date" required>
    
    <div class="w3-padding-16">
      <label>Purpose of Leave:</label>
    </div>
    
    <select class="w3-select" name="purpose_of_leave" required>
      <option value="" disabled selected>Choose your option</option>
      <option value="Sick">Sick</option>
      <option value="Personal">Personal</option>
      <option value="Holidays">Holidays</option>
      <option value="MaternityPaternity">Maternity/Paternity</option>
    </select>
    
    <div class="w3-padding-16">
      <label>Add Description</label>
    </div>
    <input class="w3-input w3-border" type="text" name="description" required></p>
  <p><button type="submit" name="submit" class="w3-btn w3-teal">Submit</button></p> 
</form>
</div>
</div>

</body>
</html>

<?php 

	if(isset($_POST['submit'])){

  		$faculty_id = $_SESSION['faculty_id'] ;
  		$designation = $_SESSION['designation'] ;
  		$dept = $_SESSION['dept'] ;

		$from_date = date('Y-m-d', strtotime($_POST['from_date'])) ;
		$to_date = date('Y-m-d', strtotime($_POST['to_date'])) ;
		$purpose = $_POST['purpose_of_leave'] ;
		$description = $_POST['description'] ;
		$result = mysqli_query($conn, "CALL new_leave_application('$faculty_id', '$from_date', '$to_date', '$purpose', '$description')") ;

		if ($designation == 'HOD' || $designation == 'DEANFA'){
	  		header('Location:hod_dean_home_pg.php') ;
	  	}
	  	elseif ($designation == 'DIR'){
	  		header('Location:director_home_pg.php') ;
	  	}
	  	else{
	  		header('Location:faculty_home_pg.php') ;
	  	}

	}

 ?>