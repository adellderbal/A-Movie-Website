<?php
// Attempt MySQL server connection.
include('dbconnect.php');
// Attempt select query execution
$sql = "SELECT mov_id, title,about FROM movies where title='The Shawshank Redemption'";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
			$mov_id=$row['mov_id'];
			echo "<b><a href=moviedetail.php?varname=$mov_id>".$row['title']."</a></b>";
            echo "<p>".$row['about']."</p>";
		}
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
// Close connection
mysqli_close($db);
?>