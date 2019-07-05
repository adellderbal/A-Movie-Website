<?php
session_start();

// initializing variables
$rating = 0.0;
$review = "";
$mov_id = $_SESSION['mov_id'];
$username = $_SESSION['username'];
$user_id = 0;
// connect to the database
include('dbconnect.php');
if (isset($_POST['RStore'])) {
	  $sql0 = "SELECT id FROM users WHERE username='$username'";
	  $result = mysqli_query($db, $sql0);
	  $row = mysqli_fetch_array($result);
	  $user_id=$row['id'];
	  $rating = mysqli_real_escape_string($db, $_POST['rating']);
	  $review = mysqli_real_escape_string($db, $_POST['Review']);
	  $sql = "UPDATE r_r SET r_data='$review', num_rating='$rating' WHERE mov_id='$mov_id' AND id='$user_id'";
	  $result = mysqli_query($db, $sql);
	  if(mysqli_num_rows($result)==0)
	  {
		$sql1 = "INSERT INTO r_r(id,mov_id, r_data, num_rating) VALUES('$user_id','$mov_id', '$review', '$rating')";  
		$result1 = mysqli_query($db, $sql1);
	  }
	  $_SESSION['success1'] = "Done!";
	  header("location: moviedetail.php?varname=$mov_id");
}
?>