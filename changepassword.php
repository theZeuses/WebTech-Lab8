<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="changepasswordStyle.css">
</head>
<body>
	<?php
		$cpass=$npass=$rpass="";
		$cpassErr=$npassErr=$rpassErr="";
		$val=FALSE;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$val=TRUE;
	        if (empty($_POST["cpass"])) {
		        $cpassErr = "This is required";
		        $val=FALSE;
	        } 
	        else {
	            $cpass = test_input($_POST["cpass"]);
	        }
	        if (empty($_POST["npass"])) {
		        $npassErr = "This is required";
		        $val=FALSE;
	        }
	        else {
	            $npass = test_input($_POST["npass"]);
	        }
	        if (empty($_POST["rpass"])) {
		        $rpassErr = "This is required";
		        $val=FALSE;
	        }
	        else {
	            $rpass = test_input($_POST["rpass"]);
	        }
	        if($_POST["cpass"]!=$_SESSION["password"]){
	        	$cpassErr = "Does not Match";
		        $val=FALSE;
	        }
	        if($_POST["npass"]!=$_POST["rpass"]){
	        	$rpassErr = "Does not Match";
		        $val=FALSE;
	        }
	        
		}
		function test_input($data) {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
	    }	
	?>
	<?php
		if($val){
        	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "myDB";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			$usrname=$_SESSION["username"];
			$sql = "UPDATE Users SET password='$npass' WHERE username='$usrname'";

			if ($conn->query($sql) === TRUE) {
				$_SESSION["password"]=$npass;
			    header('location:updatesuccessful.php');
	        	exit();

			} else {
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
	    }
	?>
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
		    	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<fieldset>
					  	<legend><h2>Change Password</h2></legend>
					  	<label for="cpass">Current Password:</label>
					  	<input type="password" id="cpass" name="cpass"><span class="error">* <?php echo $cpassErr;?></span><br>
					  	<br><div class="line"></div><br>
					  	<label for="npass">New Password:</label>
					  	<input type="password" id="npass" name="npass"><span class="error">* <?php echo $npassErr;?></span><br>
					  	<br><div class="line"></div><br>
					  	<label for="rpass">Retype Password:</label>
					  	<input type="password" id="rpass" name="rpass"><span class="error">* <?php echo $rpassErr;?></span><br>
					  	<br><div class="line"></div><br>
					   	<input type="submit" value="submit"><br>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">Copyright:2017</div>
</body>
</html>