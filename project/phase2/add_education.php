<?php 


session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    class Education{
    	var $degree ;
        var $department;
        var $university;
        var $year_of_grad;

        public function __construct($degree, $department, $university, $year_of_grad){
        	$this->degree = $degree;
            $this->department = $department;
            $this->university = $university;
            $this->year_of_grad = $year_of_grad;
        }
    }

    $faculty_id = $_SESSION['faculty_id'];

    $new_edu = new Education($_POST['degree'], $_POST['department'], $_POST['university'], $_POST['year_of_grad']);

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $education = $document['education'];

    $update_edu = array();

    for($i=0; $i<count($education); $i++){
        array_push($update_edu, $education[$i]);
    }

    array_push($update_edu, $new_edu);

    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['education'=>$update_edu]]
    );

    header('Location:./edit_profile.php');


 ?>