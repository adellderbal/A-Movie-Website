<?php

/* Attempt MySQL server connection.*/
include('dbconnect.php');

// initializing variables
$movie_id = $_GET['movie_id'];
$img_src= "";
$title0= "";
 
// Attempt select query execution
$sql = "SELECT title, img_path FROM movies WHERE mov_id='$movie_id'";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			$title0=$row['title'];
			$img_src=$row['img_path'];
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
<!DOCTYPE html>
<html>
<title>POSTER</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/poster.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<style>
body {font-family: "Raleway", Arial, sans-serif}
.img-row img {margin-bottom: -8px}
</style>
<body>

<!-- !PAGE CONTENT! -->
<div class="img-content" style="max-width:1500px">

  <!-- Header -->
<?php
  echo"<header class='img-container img-xlarge img-padding-24'>";
	echo"<a href=# class='img-left img-button img-white'>".$title0."</a>";
    echo"<a href=moviedetail.php?varname=$movie_id class='img-left img-button img-white'>Back</a>";
  echo"</header>";
?>
  <!-- Photo Grid -->
  <div class="img-row">
    <div class="img-half">
      <?php echo"<img src=$img_src style=width:57%>"?>
    </div>
  </div>
  
<!-- End Page Content -->
</div>

</body>
</html>
