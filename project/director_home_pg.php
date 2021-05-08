<?php

  session_start() ;

  include('dbms_connect.php') ;

  error_reporting(0) ;

  $faculty_id = $_SESSION['faculty_id'] ;
  $designation = $_SESSION['designation'] ;
  $dept = $_SESSION['dept'] ;

  $query = "SELECT * FROM director" ;
  $rows = mysqli_query($conn, $query);
  $leave_id_facs = mysqli_fetch_all($rows, MYSQLI_ASSOC);

  $sql_query = "SELECT * from faculty where facultyID = '$faculty_id'" ;
  $result = mysqli_query($conn, $sql_query) ;
  $data = mysqli_fetch_array($result);
  $faculty_name = $data['name'];

 ?>


<!DOCTYPE html>
<html>
<title>Director Home Page</title>
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

<div class="w3-margin-bottom">
  <header class="w3-container">
    <h5><b><i class="fa fa-check"></i> Check Application Status</b></h5>
  </header>
    <form class="w3-container" action="#" method="post">
      <label> Select Leave ID:</label>
      <select class="w3-select" name="option" required>
      <option value="" disabled selected>Choose your option</option>
      <?php foreach($leave_id_facs as $leave_ids): ?>
        <option value="<?php echo htmlspecialchars($leave_ids['leaveID']);?>"><?php echo htmlspecialchars($leave_ids['leaveID']);?></option>
      <?php endforeach; ?>
    </select>
    
    <p><button type="submit" name="application_status" class="w3-btn w3-black">Submit</button></p> 
    </form>
</div>


<div class="w3-margin-bottom">
  <header class="w3-container">
    <h5><b><i class="fa fa-random"></i> Change Faculty Posts</b></h5>
  </header>
    <form class="w3-container" action="#" method="post">
    
    <div class="w3-row-padding">
    <div class="w3-half">
      <label>Enter Faculty ID:</label>
      <input class="w3-input" type="text" name="new_faculty_id" required>
    </div>
    
    <div class="w3-half">
      <label> Select New Designation:</label>
      <select class="w3-select" name="new_designation" required>
      <option value="" disabled selected>Choose your option</option>
      <option value="Fac">Faculty</option>
      <option value="HOD">HoD</option>
      <option value="DEANFA">Dean FAA</option>
      <option value="DEANSA">Dean SA</option>
      <option value="DEANAA">Dean AA</option>
      </select>
    </div>
    </div>
    </div>
    <div style="padding-left: 32px">
    <button type="submit" name="change_designation" class="w3-btn w3-black">Submit</button>
    </div>
    </form>
    
</div>

</div>
</body>
</html>


<?php

  if(isset($_POST['application_status'])){

    $leave_id = $_POST['option'] ;
    $_SESSION['leave_id'] = $leave_id ;
    header('location:leave_authority_pg.php') ;

  }
  else if(isset($_POST['change_designation'])){

    $new_faculty_id = $_POST['new_faculty_id'] ;
    $new_designation = $_POST['new_designation'] ;

    require "vendor/autoload.php";
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;


    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$new_faculty_id],
        ['$set'=>['designation'=>$new_designation]]
    );

    $result = mysqli_query($conn, "CALL change_designation('$new_faculty_id', '$new_designation')") ;

  }

 ?>

