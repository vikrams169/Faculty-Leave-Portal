<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    $faculty_id = $_SESSION['faculty_id'];

    $remove_number = (int)$_POST['remove_number'];

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $courses_taught = $document['courses_taught'];

    $update_courses_taught = array();

    for($i=0; $i<count($courses_taught); $i++){
        $course_taught = $courses_taught[$i];

        if($i != ($remove_number - 1)){
            array_push($update_courses_taught, $course_taught);
        }
    }
    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['courses_taught'=>$update_courses_taught]]
    );
    
    header('Location:./edit_profile.php');


 ?>