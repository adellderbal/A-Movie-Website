<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>MCQE</title>
  
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/stylelogin.css">

  
</head>

<body>
         
  <div class="login-wrap">
	<div class="login-html">
	<h1>--------------MCQE--------------</h1>
	<br><br>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
			<form method="post" action="index.php">
			<?php include('errors.php'); ?>
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="username" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="password" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="login_user" required>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-2">Not yet a Member?</a>
				</div>
			</form>
			</div>
			<div class="sign-up-htm">
			  <form method="post" action="index.php">
				<?php include('errors.php'); ?>
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="username" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" name="email" type="text" class="input" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="password_1" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" name="password_2" type="password" class="input" data-type="password" required>
				</div>
				<div class="group">
					<input type="submit" class="button" name="reg_user" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already a Member?</a>
				</div>
			   </form>
			</div>
		</div>
	</div>
</div>
  
  

</body>

</html>
