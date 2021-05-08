<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    $faculty_id = $_SESSION['faculty_id'];

    $remove_number = (int)$_POST['remove_number'];

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $publications = $document['publications'];

    $update_publications = array();

    for($i=0; $i<count($publications); $i++){
        $publication = $publications[$i];

        if($i != ($remove_number - 1)){
            array_push($update_publications, $publication);
        }
    }
    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['publications'=>$update_publications]]
    );

    header('Location:./edit_profile.php');


 ?>