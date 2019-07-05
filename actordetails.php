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
		<title>Actors Details</title>
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
						<h1><a href="#" id="logo">Actor Details</a></h1>
					
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
							$actor_id = $_GET['varname'];
							$_SESSION['actor_id'] = $actor_id;	
							// initializing variables
							  
		
							  
							$sql = "SELECT a.name, a.gender, a.age, a.no_of_movies,a.about, a.height_in_m, aw.award_name FROM actor a, awards aw WHERE a.award_id=aw.award_id and a.actor_id ='$actor_id' ";
							if($result = mysqli_query($db, $sql)){
								  if(mysqli_num_rows($result) > 0){
							  $row = mysqli_fetch_array($result);
							  echo"<h2>".$row['name']."</h2>";
							  echo"<h3>Gender : ".$row['gender']."</h3>";
							  echo"<h3>Age : ".$row['age']."</h3>";
					          echo"<h4>No. of Movies : ".$row['no_of_movies']."</h4>";
							  echo"<h4>About : ".$row['about']."</h4>";
							  echo"<h4>Height : ".$row['height_in_m']." m</h4>";
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