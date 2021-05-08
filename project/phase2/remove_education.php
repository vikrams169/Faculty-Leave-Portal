<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    $faculty_id = $_SESSION['faculty_id'];

    $remove_number = (int)$_POST['remove_number'];

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $education = $document['education'];

    $update_edu = array();

    for($i=0; $i<count($education); $i++){
        $old_edu = $education[$i];

        if($i != ($remove_number - 1)){
            array_push($update_edu, $old_edu);
        }
    }
    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['education'=>$update_edu]]
    );

    header('Location:./edit_profile.php');


 ?>