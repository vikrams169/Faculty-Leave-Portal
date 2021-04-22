<?php
$servername = "localhost";
$username = "vikrams169";
$password = "pgsql123";
$dbname = "testpresentation";

// Create connection
$conn= mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
	echo "Server Connected";

}
else{
	echo "Server Connection failed";
}
 ?>