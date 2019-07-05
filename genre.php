<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!DOCTYPE HTML>
<html>
	<head>
<style>
@import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
.rwd-table {
  margin: 1em 0;
  min-width: 300px;
}
.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: .5em;
}
.rwd-table td:last-child {
  padding-bottom: .5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table td:before {
    display: none;
  }
}
.rwd-table th, .rwd-table td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child, .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child, .rwd-table td:last-child {
    padding-right: 0;
  }
}
.rwd-table {
  background: #34495E;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table tr {
  border-color: #46637f;
}
.rwd-table th, .rwd-table td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th, .rwd-table td:before {
  color: #dd5;
}

</style>
	
		<title>Movies</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">
	
	<!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<div align="right"><strong><?php echo $_SESSION['username']; ?></strong></div>
    	<div align="right"> <a href="index.php?logout='1'" style="color: Bold Grey;"><h6>Logout<h6></a> </div>
    <?php endif ?>
	</div>			

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">Movies by Genre</a></h1>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="home.php">Home</a></li>
								<li><a href="allmov.php">Back</a></li>
							</ul>
						</nav>

				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<div class="row">
					
						
<?php		
				//Content
						echo"<div id=content class=8u skel-cell-important>";
							echo"<section>";
/* Attempt MySQL server connection.*/
include('dbconnect.php');
$gen_id = $_GET['gen'];

$sql3 = "SELECT gen_name from genre WHERE genre_id='$gen_id';";
if($result3 = mysqli_query($db, $sql3)){
if(mysqli_num_rows($result3) > 0){
if($row3 = mysqli_fetch_array($result3)){
								echo"<header class=major>";
									echo"<h2>All Featured Movies: By ".$row3['gen_name']."</h2>";
}
}
}									


// initializing variables
$mov_id = array(); 
$x = 0;
$y = 0;

 
// Attempt select query execution
$sql = "SELECT mov_id,title,rl_date,length,lang, about, g.gen_name FROM movies,genre g where movies.genre_id=g.genre_id AND movies.genre_id='$gen_id'";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
		echo "<table class=rwd-table>";
            echo "<tr>";
                echo "<th><b>Title</b></th>";
                echo "<th><b>Release Date</b></th>";
                echo "<th><b>Duration</b></th>";
                echo "<th><b>Language</b></th>";
                echo "<th><b>About</b></th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
			    $mov_id[$x]=$row['mov_id'];
				$x++;
                echo "<td><a href=moviedetail.php?varname=$mov_id[$y]>" . $row['title'] . "</a></td>";
				$y++;
                echo "<td>" . $row['rl_date'] . "</td>";
                echo "<td>" . $row['length'] . "</td>";
                echo "<td>" . $row['lang'] . "</td>";
                echo "<td>" . $row['about'] . "</td>";
				echo "</tr>";
			
        }
        echo "</table>";
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
									
								</header>
							</section>
						</div>
					
					</div>
				</div>
			</div>
			</body>
</html>