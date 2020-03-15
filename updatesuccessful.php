<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="editprofileStyle.css">
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
		    <div class="content" align="center"><h2>Update Successful.</h2></div>
		</div>
	</div>
	<div class="footer">Copyright:2017</div>
</body>
</html>