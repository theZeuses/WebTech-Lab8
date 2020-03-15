<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="viewprofileStyle.css">
</head>
<body>
	<div class="header">
		<h1>xCompany</h1>
		<div align="right">Logged in as <?php echo $_SESSION["name"]; ?>
		</div>		
		<div class="topnav">
			<a href="home_.php">Log Out</a>
		</div>
	</div>
		
	<div class="container">
		<div class="column1">
		<div class="subhead">
			Account
		</div>
		<div class="sidenav">
		    <a href="dashboard.php">Dashboard</a>
		    <a href="viewprofile.php">View Profile</a>
		    <a href="editprofile.php">Edit Profile</a>
		    <a href="changeprofilepicture.php">Change Profile Picture</a>
		    <a href="changepassword.php">Change Password</a>
		    <a href="home_.php">Log Out</a>
		</div>
	</div>
		<div class="column2">
		    <div>
		    	<fieldset>
					<legend><h2>View Profile</h2></legend>
					<label for="name">Name:</label>
					<?php echo $_SESSION["name"]; ?>
					<br><div class="line"></div><br>
					<label for="email">Email:</label>
					<?php echo $_SESSION["email"]; ?>
					<br><div class="line"></div><br>
					<label for="gender">Gender:</label>
					<?php echo $_SESSION["gender"]; ?>
					<br><div class="line"></div><br>
					<label for="date">Date of Birth:</label>
					<?php echo $_SESSION["dob"]; ?>
					<br><div class="line"></div><br>
					<br><br>

					<div class="topnav">
						<a href="editprofile.php">Edit Profile</a>
					</div>
				</fieldset>
			</div>
		</div>
		<div class="column3">
			<?php
				if($_SESSION["image"]==null){
					echo "<img src='image.jpg' alt='profile picture' height='42' width='42' border='solid'>";
				}
				else{
					$image=$_SESSION["image"];
					echo "<img src='$image' alt='profile picture' height='42' width='42' border='solid'>";
				}
			?>
			<a href="changeprofilepicture.php">Change</a>
		</div>
	</div>
	<div class="footer">Copyright:2017</div>
</body>
</html>