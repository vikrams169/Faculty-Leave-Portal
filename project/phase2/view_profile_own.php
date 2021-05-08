<?php 

    session_start();
  
    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    $faculty_id = $_SESSION['faculty_id'];

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $des = $document['designation'];
    $home_pg = '';
    if($des == 'DEANFA' || $des == 'HOD'){
    	$home_pg = '../hod_dean_home_pg.php';
    }
    elseif($des == 'DIR'){
    	$home_pg = '../director_home_pg.php';
    }
    else{
    	$home_pg = '../faculty_home_pg.php';
    }


 ?>

<!DOCTYPE html>
<html>
<title>View Own Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */


.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="<?= $home_pg ?>" class="w3-bar-item w3-button w3-small">HOME PAGE</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#bio" class="w3-bar-item w3-button w3-small"><i class="fa fa-user"></i> BIO</a>
      <a href="#publications" class="w3-bar-item w3-button w3-small"><i class="fa fa-th"></i> PUBLICATIONS</a>
      <a href="#awards" class="w3-bar-item w3-button w3-small"><i class="fas fa-award"></i> AWARDS</a>
      <a href="#teaching" class="w3-bar-item w3-button w3-small"><i class="fas fa-chalkboard"></i> TEACHING</a>
      <a href="#education" class="w3-bar-item w3-button w3-small"><i class="fas fa-graduation-cap"></i> EDUCATION</a>
      <a href="edit_profile.php" class="w3-bar-item w3-button w3-small"><i class="fas fa-pencil-alt"></i> EDIT</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>
 
<div class= "w3-padding-left-16" style="margin-top:75px;padding-left:15px;padding-right:15px">
  <form class="example" action="view_profile_other.php" method = "post">
    <input type="text" placeholder="Enter the Faculty ID" name="faculty_id_view" required>
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
</div>

<!-- Header with full-height image -->
<div>
  <div class="w3-container">
    <div class="w3-col m4"  style="margin-top:20px">
      <img class="w3-image w3-round-large w3-left" src="profile_pic.png" alt="Profile_Pic" width="200" height="200">
    </div>    
    <div class="w3-col m4" style="margin-top:5px" id="home">
      <h3><?php echo htmlspecialchars($document['name']);?></h3>
      <p>Faculty ID: <?php echo htmlspecialchars($document['faculty_id']);?></p>
      <p>Designation: <?php echo htmlspecialchars($document['designation']);?></p>
      <p>Department: <?php echo htmlspecialchars($document['department']);?></p>
      <p>Email ID: <?php echo htmlspecialchars($document['email']);?></p>
    </div>
    <div class="w3-col m4" style="margin-top:20px">
      <div class="w3-card w3-round w3-light-grey w3-hide-small">
        <div class="w3-container">
          <h5>Research Interests</h5>
          <p>
            <?php 
              $research_interests = $document['research_keywords'];
                for($i=0; $i<count($research_interests); $i++){
                    $interest = $research_interests[$i];
               ?>
               <span class="w3-tag w3-small w3-theme-d5"><?php echo htmlspecialchars($interest);?></span><?php } ?>    
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="w3-container" id="bio">
  <h3 class="w3-center">BIOGRAPHY</h3>
  <p class="w3-center"><?php echo htmlspecialchars($document['bio']);?></p>
</div>

<div class="w3-container w3-dark-grey" id="publications">
  <h3 class="w3-center" style="font-color:white">PUBLICATIONS</h3>
  <?php 
        $publications = $document['publications'];
        for($i=0; $i<count($publications); $i++){
            $title=$publications[$i]['title'];
            $conference=$publications[$i]['conference'];
            $collaborators=$publications[$i]['collaborators'];
            $year=$publications[$i]['year'];
   ?>
        <p><B><?php echo htmlspecialchars($title);?></B>
            <br><i><?php echo htmlspecialchars($conference);?></i>
            <br><i><?php echo htmlspecialchars(' Collaborators: '.$collaborators);?></i>
            <br><i><?php echo htmlspecialchars($year);?></i></p>    
        <?php } ?>
</div>

<div class="w3-container" id="awards">
  <h3 class="w3-center">AWARDS</h3>
  <?php 
        $awards = $document['awards'];
        for($i=0; $i<count($awards); $i++){
            $name=$awards[$i]['name'];
            $awarded_by=$awards[$i]['awarded_by'];
            $year=$awards[$i]['year'];
   ?>
        <p><B><?php echo htmlspecialchars($name);?></B><br><i><?php echo htmlspecialchars(' Awarded By: '.$awarded_by);?></i><br><i><?php echo htmlspecialchars($year);?></i></p>    
        <?php } ?>
</div>

<div class="w3-container w3-dark-grey" id="teaching">
  <h3 class="w3-center">TEACHING</h3>
  <?php 
        $courses_taught = $document['courses_taught'];
        for($i=0; $i<count($courses_taught); $i++){
            $course_code=$courses_taught[$i]['course_code'];
            $course_name=$courses_taught[$i]['course_name'];
   ?>
        <p><B><?php echo htmlspecialchars($course_code);?></B><br><i><?php echo htmlspecialchars($course_name);?></i></p>    
        <?php } ?>
</div>

<div class="w3-container" id="grants">
  <h3 class="w3-center">GRANTS</h3>
  <?php 
  $grants = $document['grants'];
    for($i=0; $i<count($grants); $i++){
        $name=$grants[$i]['name'];
        $sponsor=$grants[$i]['sponsor'];
        $year=$grants[$i]['year'];
   ?>
   <p><B><?php echo htmlspecialchars($name);?></B><br><i><?php echo htmlspecialchars(' Sponsored By: '.$sponsor);?></i><br><i><?php echo htmlspecialchars($year);?></i></p><?php } ?>    
</div>

<div class="w3-container w3-dark-grey" id="education">
  <h3 class="w3-center">EDUCATION</h3>
  <?php 
        $education = $document['education'];
        for($i=0; $i<count($education); $i++){
            $degree=$education[$i]['degree'];
            $department=$education[$i]['department'];
            $university=$education[$i]['university'];
            $year_of_grad=$education[$i]['year_of_grad'];
   ?>
        <p><B><?php echo htmlspecialchars($degree);?></B><?php echo htmlspecialchars(' in '.$department);?><br><i><?php echo htmlspecialchars($university);?></i><br><i><?php echo htmlspecialchars($year_of_grad);?></i></p>    
        <?php } ?>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <p>Made by Parnavi & Vikram</p>
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
