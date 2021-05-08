<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    $faculty_id = $_SESSION['faculty_id'];

    $update_basic_bio = $_POST['update_basic_bio'];

    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['bio'=>$update_basic_bio]]
    );

    header('Location:./edit_profile.php');


 ?>