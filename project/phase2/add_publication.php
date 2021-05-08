<?php 


	 session_start();

	    require "../vendor/autoload.php" ; 
	    $client = (new MongoDB\Client);
	    $collection = $client->leave_portal_db->faculty_details;

	    $faculty_id = $_SESSION['faculty_id'];

	    class Publication{
	        var $title;
	        var $year;
	        var $conference;
	        var $collaborators;

	        public function __construct($title, $conference, $year, $collaborators){
	            $this->collaborators = $collaborators;
	            $this->conference = $conference;
	            $this->year = $year;
	            $this->title = $title;
	        }
	    }

	    $publication = new Publication($_POST['title'], $_POST['conference'], $_POST['year'], $_POST['collaborators']);

	    $document = $collection->findOne(['faculty_id' => $_SESSION['faculty_id']]);

	    $publications = $document['publications'];

	    $update_publications = array();

	    for($i=0; $i<count($publications); $i++){
	        array_push($update_publications, $publications[$i]);
	    }

	    array_push($update_publications, $publication);

	    $updated_collection = $collection->updateOne(
	        ['faculty_id'=>$faculty_id],
	        ['$set'=>['publications'=>$update_publications]]
	    );

	    header('Location:./edit_profile.php');


 ?>