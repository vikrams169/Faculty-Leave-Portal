<?php 


	session_start();

    require "../vendor/autoload.php" ; 
    $client = (new MongoDB\Client);
    $collection = $client->leave_portal_db->faculty_details;

    class CourseTaught{
        var $course_code;
        var $course_name;

        public function __construct($course_code, $course_name){
            $this->course_code = $course_code;
            $this->course_name = $course_name;
        }
    }

    $faculty_id = $_SESSION['faculty_id'];

    $new_course_taught = new CourseTaught($_POST['course_code'], $_POST['course_name']);   

    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

    $courses_taught = $document['courses_taught'];

    $update_courses_taught = array();

    for($i=0; $i<count($courses_taught); $i++){
        array_push($update_courses_taught, $courses_taught[$i]);
    }

    array_push($update_courses_taught, $new_course_taught);

    $updated_collection = $collection->updateOne(
        ['faculty_id'=>$faculty_id],
        ['$set'=>['courses_taught'=>$update_courses_taught]]
    );

    header('Location:./edit_profile.php');


 ?>