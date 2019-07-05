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
		<title>Director Details</title>
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
	<body class="no-sidebar">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">Director Details</a></h1>
					
					<nav id="nav">
							<ul>
								<li><a href="home.php">Home</a></li>
							</ul>
						</nav>

				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<section>
						<header class="major">
							  <?php
							include('dbconnect.php');
							$director_id = $_GET['varname'];
							$_SESSION['director_id'] = $director_id;	
							// initializing variables
							  
		
							  
							$sql = "SELECT d.name, d.gender, d.age, d.no_of_movies,d.about, aw.award_name FROM director d, awards aw WHERE d.award_id=aw.award_id and d.director_id ='$director_id' ";
							if($result = mysqli_query($db, $sql)){
								  if(mysqli_num_rows($result) > 0){
							  $row = mysqli_fetch_array($result);
							  echo"<h2>".$row['name']."</h2>";
							  echo"<h3>Gender : ".$row['gender']."</h3>";
							  echo"<h3>Age : ".$row['age']."</h3>";
					          echo"<h4>No. of Movies : ".$row['no_of_movies']."</h4>";
							  echo"<h4>About : ".$row['about']."</h4>";
							  echo"<h4>Awards : ".$row['award_name']."</h4>";
								  }
							}
							?>
							<span class="byline"></span>
						</header>
						</section>
				</div>
			</div>
	</body>
</html>