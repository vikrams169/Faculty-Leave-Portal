<?php 

  session_start() ;

  include('dbms_connect.php') ;

  error_reporting(0) ;

  $faculty_id = $_SESSION['faculty_id'] ;
  $designation = $_SESSION['designation'] ;
  $dept = $_SESSION['dept'] ;

  $leave_id = $_SESSION['leave_id'] ;
  $table_name = 'application_table_' . $leave_id ;

  $sql_query = "SELECT * FROM $table_name ORDER BY action_number" ;
  $data = mysqli_query($conn, $sql_query);
  $all_rows = mysqli_fetch_all($data, MYSQLI_ASSOC);

  $sql_query_2 = "SELECT * FROM faculty, leave_app WHERE faculty.facultyID = leave_app.facultyID and leave_app.leaveID = '$leave_id'" ; 
  $result = mysqli_query($conn,$sql_query_2) ;
  $data = mysqli_fetch_array($result);
  $faculty_name = $data['name'] ;

  $sql_query_3 = "SELECT * FROM leave_app WHERE leaveID = '$leave_id'" ; 
  $result = mysqli_query($conn,$sql_query_3) ;
  $data = mysqli_fetch_array($result);
  $application_status = $data['status'] ;
  $purpose = $data['purpose'] ;
  $description = $data['description'] ;
  $from_date = $data['from_date'] ;
  $to_date = $data['to_date'] ;

 ?>

<!DOCTYPE html>
<html>
<title>Leave Authority Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

span.a {
  display: inline; /* the default for span */
  width: 100px;
  height: 100px;
  padding: 10px;
  border: 1px white;
  position: left;
  background-color: transparent; 
}

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

<div class="w3-main" style="margin-left:300px;margin-top:43px;">


<!-- leave ID -->
  <div class="w3-col s8 w3-bar w3-padding-16" style="padding-left:15px"> 
    <h8>Leave ID:</h8> 
      <span class="a"><?php echo htmlspecialchars($leave_id);?></span>
  </div>
  
  <div class="w3-col s8 w3-bar" style="padding-left:15px"> 
    <h8>Faculty Name:</h8> 
      <span class="a"><?php echo htmlspecialchars($faculty_name);?></span>
  </div>

  <div class="w3-col s8 w3-bar" style="padding-left:15px"> 
  	<h8>Duration:</h8> 
      <span class="a">From  <?php echo htmlspecialchars($from_date);?> to <?php echo htmlspecialchars($to_date);?></span>
  </div>

  <div class="w3-col s8 w3-bar" style="padding-left:15px"> 
  	<h8>Purpose of Leave:</h8> 
      <span class="a"><?php echo htmlspecialchars($purpose);?></span>
  </div>


  <div class="w3-col s8 w3-bar" style="padding-left:15px"> 
  	<h8>Leave Description:</h8> 
      <span class="a"><?php echo htmlspecialchars($description);?></span>
  </div>

  <div class="w3-col s8 w3-bar w3-padding-16" style="padding-left:15px"> 
    <h8>Overall Status:</h8> 
      <span class="a"><?php echo htmlspecialchars($application_status);?></span>
  </div>
  
  <div class="w3-col s8 w3-bar " style="padding-left:15px">
    <h8><strong>Action:</strong></h8>
  </div>
  
  <form class="w3-container" action="#" method="post">
      <select class="w3-select" name="option" required>
      <option value="" disabled selected>Status</option>
      <option value="approved">Approve</option>
      <option value="rejected">Reject</option>
      <option value="on hold">Put On Hold</option>
    </select>
     
    <div style="text-color: white">
    <label style="font-color: white">Comment:</label>
    <input class="w3-input w3-border" type="text" name="Comment">
        
    <p><button type="submit" name="submit" class="w3-btn w3-green">Submit</button></p> 
  </form>

  
  <div class="w3-col s8 w3-bar w3-padding-16" style="padding-left:15px">
    <h8>Status So Far:</h8>
  </div>
    
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-light-grey">
        <th>User</th>
        <th>Remark</th>
        <th>Action</th>
        <th class="w3-right-align">Timestamp</th>
      </tr>
    </thead>
    <?php foreach($all_rows as $row): ?>
    <tr>
          <td><?php echo htmlspecialchars($row['person']);?></td>
          <td><?php echo htmlspecialchars($row['remark']);?></td>
          <td><?php echo htmlspecialchars($row['action']);?></td>
          <td class="w3-right-align"><?php echo htmlspecialchars($row['timestamp_record']);?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  
  <br>

  
</div>
</body>
</html>





 <?php 

 if(isset($_POST['submit'])){
    $designation = $_SESSION['designation'] ;
    $leave_id = $_SESSION['leave_id'] ;
    $comment = $_POST['Comment'] ;
    $action_made = $_POST['option'] ;
    $result = mysqli_query($conn, "CALL edit_leave_application('$leave_id', '$designation', '$comment', '$action_made')") ;

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
