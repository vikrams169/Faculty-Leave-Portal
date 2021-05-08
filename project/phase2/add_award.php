<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    class Award{
        var $name;
        var $awarded_by;
        var $year;

        public function __construct($name, $awarded_by, $year){
            $this->name = $name;
            $this->awarded_by = $awarded_by;
            $this->year = $year;
        }
    }

    $faculty_id = $_SESSION['faculty_id'];

    $new_award = new Award($_POST['name'], $_POST['awarded_by'], $_POST['year']);   

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $awards = $document['awards'];

    $update_awards = array();

    for($i=0; $i<count($awards); $i++){
        array_push($update_awards, $awards[$i]);
    }

    array_push($update_awards, $new_award);

    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['awards'=>$update_awards]]
    );

    header('Location:./edit_profile.php');


 ?>