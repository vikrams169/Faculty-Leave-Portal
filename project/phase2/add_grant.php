<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    class Grant{
        var $name;
        var $sponsor;
        var $year;

        public function __construct($name, $sponsor, $year){
            $this->name = $name;
            $this->sponsor = $sponsor;
            $this->year = $year;
        }
    }

    $faculty_id = $_SESSION['faculty_id'];

    $new_grant = new Grant($_POST['name'], $_POST['sponsor'], $_POST['year']);   

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $grants = $document['grants'];

    $update_grants = array();

    for($i=0; $i<count($grants); $i++){
        array_push($update_grants, $grants[$i]);
    }

    array_push($update_grants, $new_grant);

    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['grants'=>$update_grants]]
    );

    header('Location:./edit_profile.php');


 ?>