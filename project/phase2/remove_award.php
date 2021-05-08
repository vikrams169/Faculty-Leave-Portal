<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    $faculty_id = $_SESSION['faculty_id'];

    $remove_number = (int)$_POST['remove_number'];

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $awards = $document['awards'];

    $update_awards = array();

    for($i=0; $i<count($awards); $i++){
        $award = $awards[$i];

        if($i != ($remove_number - 1)){
            array_push($update_awards, $award);
        }
    }
    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['awards'=>$update_awards]]
    );

    header('Location:./edit_profile.php');


 ?>