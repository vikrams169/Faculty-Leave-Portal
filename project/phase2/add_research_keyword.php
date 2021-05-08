<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    $faculty_id = $_SESSION['faculty_id'];

    $add_keyword = $_POST['add_research_keyword'];

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $research_keywords = $document['research_keywords'];

    $update_research_keywords = array();

    for($i=0; $i<count($research_keywords); $i++){
        array_push($update_research_keywords, $research_keywords[$i]);
    }

    array_push($update_research_keywords, $add_keyword);

    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['research_keywords'=>$update_research_keywords]]
    );

    header('Location:./edit_profile.php');


 ?>