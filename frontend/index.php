<?php 

session_start() ;

include('dbms_connect.php') ;

error_reporting(0) ;

 ?>

<!DOCTYPE html>
<html>
<title>LOGIN Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Spiraliitropar.jpg/440px-Spiraliitropar.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 8px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <div class="w3-right w3-hide-small">
      <a href="https://www.iitrpr.ac.in/" class="w3-bar-item w3-button"><i class="fa fa-user"></i>HOME PAGE</a>
    </div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
  <span class="w3-xxxlarge w3-hide-small"> </span><br>
    <span class="w3-xxxlarge w3-hide-small">IIT Ropar Faculty Leave Management Portal</span><br>
  <span class="w3-large w3-hide-small">Login</span><br>
     <form action="#" method="post">
      <p><input class="w3-input w3-border" type="text" placeholder="Faculty ID" required name="FacultyID"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Password" required name="Password"></p>
      <p>
        <button name='submit' class="w3-button w3-black" type="submit">
          SUBMIT
        </button>
      </p>
    </form>
    <center>
    <span class="w3-small">Developed by Parnavi and Vikram</span><br>
    </center>
  </div> 
</header>
</body>
</html>

<?php

	if(isset($_POST['submit'])){

	$faculty_id = $_POST['FacultyID'];
	$pwd = $_POST['Password'];


	if($faculty_id != "" && $pwd != "" )
	{
		$sql_query = "SELECT * FROM faculty WHERE facultyID = '$faculty_id' and password = '$pwd'" ;	
		$result = mysqli_query($conn,$sql_query) ;
		$data = mysqli_fetch_array($result);
		$designation = $data['designation'] ;
		$dept = $data['dept'] ;
		$total = mysqli_num_rows($result) ;

		if($total > 0)
		{

			$_SESSION['faculty_id'] = $faculty_id ;
			$_SESSION['designation'] = $designation ;
			$_SESSION['dept'] = $dept ;

		  	if ($designation == 'DEANFA' || $designation == 'HOD'){
		  		header('location:hod_dean_home_pg.php') ;
		  	}
		  	elseif ($designation == 'DIR'){
		  		header('location:director_home_pg.php') ;
		  	}
		  	else{
		  		header('location:faculty_home_pg.php') ;
		  	}
		}
		else if($total==0)
		{
		  echo "<h5>Plz Enter a Correct Faculty ID or Password</h5>";
		}
	}
}


 ?>


