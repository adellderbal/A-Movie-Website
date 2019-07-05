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
		<title>Dashboard</title>
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
    	<!--<div align="right"> <a href="index.php?logout='1'" style="color: Bold Grey;"><h6>Logout<h6></a> </div>-->
    <?php endif ?>
	</div>	

	<!-- notification message -->
  	<?php if (isset($_SESSION['success2'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success2']; 
          	unset($_SESSION['success2']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
	
		<!-- Header -->
			<div id="header">
				<div class="container">
				
					<!-- Logo -->
						<h1><a href="#" id="logo">Dashboard</a></h1>
					
					<nav id="nav">
							<ul>
								<li><a href="home.php">Home</a></li>
								<li>
									<a href="">Actions</a>
									<ul>
										<li><a href="deluser.php" onclick="return confirm('This can\'t be Undone!');">Delete Account</a></li>
										<li><a href="index.php?logout='1'" onclick="return confirm('Are You Sure?');" style="color: Bold Grey;">Logout</a></li>
									</ul>
								</li>
							</ul>
						</nav>

				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<section>
						<header class="major">
							<h2>Dashboard</h2>
							<span class="byline">My Reviews (To edit go to details page of the Movie, Corresponding link given with your Review)</span>
							</header>
					</section>
					<?php
							include('dbconnect.php');
						
					        $sql = "SELECT m.mov_id, m.title, r.r_data, r.num_rating from users u, r_r r, movies m where u.username='$_SESSION[username]' AND u.id=r.id AND m.mov_id=r.mov_id";
							if($result = mysqli_query($db, $sql)){
								  if(mysqli_num_rows($result) > 0){
							 while($row = mysqli_fetch_array($result)){
								$_SESSION['del']=$row['mov_id'];
								$mov_id=$_SESSION['del'];
								echo"<a href=moviedetail.php?varname=$mov_id><h3> ".$row['title']."</h3></a>"; 
								echo"<b> ".$row['num_rating']."/10 </b><br>"; 
								echo"<b> ".$row['r_data']."</b><br>";
								?><a href="rdel.php?del=<?php echo $mov_id; ?>" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a><br><br><br><br><?php
								}
							}
						}
					?>
	</body>
</html>