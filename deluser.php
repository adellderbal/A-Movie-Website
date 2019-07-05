<?php
session_start();
$username=$_SESSION['username'];

// connect to the database
include('dbconnect.php');
	  $sql0 = "SELECT id FROM users WHERE username='$username'";
	  $result0 = mysqli_query($db, $sql0);
	  $row0 = mysqli_fetch_array($result0);
	  $user_id=$row0['id'];
	  
    $tbl="users";
    $sql="DELETE FROM $tbl WHERE id = '$user_id'";
    session_destroy();
  	unset($_SESSION['username']);
    $result = mysqli_query($db, $sql);
    if($result){
        echo "Deleted Successfully";
        echo "<BR>";
        echo "<a href='index.php'>Back to main page</a>";
    }
	else {
        echo "ERROR";
    }
?>