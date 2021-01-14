<?php
 session_start();
  //This is the DB connection for my local server.
	$conn = mysqli_connect('localhost', 'wissy47', 'qwerty123Q', 'handwork');


	if (!$conn) {
		echo 'Connection Error: ' . mysqli_connect_error();
	}


function queryResult($email)
{
	global $conn;
	 $query = "SELECT * FROM users WHERE user_email = '$email'";
	 $result = mysqli_query($conn, $query);
	 return $result;
}
function queryResult_for_artisans($email)
{
	global $conn;
	 $query = "SELECT * FROM artisans WHERE user_email = '$email'";
	 $result = mysqli_query($conn, $query);
	 return $result;
}

function queryResult_for_artisan($adminEmail)
{
	global $conn;
	 $query = "SELECT * FROM artisans WHERE created_by = '$adminEmail'";
	 $results = mysqli_query($conn, $query);
	 $result = mysqli_fetch_all($results, MYSQLI_ASSOC);
	 mysqli_free_result($results);

	 mysqli_close($conn);

	 return $result;
  } 
 if(isset($_GET['functions'])){
	if($_GET['functions'] == "logout"){
	session_destroy();
	header('location: index.php');
	}
}