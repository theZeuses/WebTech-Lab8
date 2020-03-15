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
	<?php
	    $name="";$gender="male";$email="";$dob="";$nameErr=$emailErr=$dobErr="";$val=FALSE;
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	        $val=TRUE;
	        if (empty($_POST["name"])) {
		        $nameErr = "Name is required";
		        $val=FALSE;
	        } else {
	            $name = test_input($_POST["name"]);
	        }
	 
	       if (empty($_POST["dob"])) {
		        $dobErr = "This is required";
		        $val=FALSE;
	       } else {
	          	$dob = test_input($_POST["dob"]);
	       }

	       if (empty($_POST["email"])) {
		        $emailErr = "Email is required";
		        $val=FALSE;
	       } else {
		        $email = test_input($_POST["email"]);
		        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		            $emailErr = "Invalid email format";
		            $val=FALSE;
		        }
	       }
	      
	       $gender = $_POST["gender"];
	    }

	    function test_input($data) {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
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
					  	<legend><h2>Edit Profile</h2></legend>
					  	<label for="name">Name:</label>
					  	<input type="text" id="name" name="name" value="<?php echo $_SESSION["name"]; ?>"><span class="error">* <?php echo $nameErr;?></span><br>
					  	<br><div class="line"></div><br>
					  	<label for="email">Email:</label>
					  	<input type="email" id="email" name="email" value="<?php echo $_SESSION["email"]; ?>"><span class="error">* <?php echo $emailErr;?></span><br>
					  	<br><div class="line"></div><br>
					 	<legend>Gender</legend>
					     <input type="radio" id="male" name="gender" value="male" <?php if($_SESSION["gender"]=="male") echo "checked";?>>
					    <label for="male">Male</label>
					    <input type="radio" id="female" name="gender" value="female" <?php if($_SESSION["gender"]=="female") echo "checked";?>>
					    <label for="female">Female</label>
					    <input type="radio" id="other" name="gender" value="other" <?php if($_SESSION["gender"]=="other") echo "checked";?>>
					    <label for="other">Other</label>
					  	<br><div class="line"></div><br>
					  	<label for="date">Date of Birth:</label>
					  	<input type="date" id="date" name="dob" value="<?php echo $_SESSION["dob"]; ?>"><span class="error">* <?php echo $dobErr;?></span><br>
					  	<br><div class="line"></div><br>
					  	<input type="submit" value="Submit">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">Copyright:2017</div>
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
			$sql = "UPDATE Users SET name='$name',email='$email',dob='$dob',gender='$gender' WHERE username='$usrname'";

			if ($conn->query($sql) === TRUE) {
				$_SESSION["name"]=$name;
				$_SESSION["email"]=$email;
				$_SESSION["dob"]=$dob;
				$_SESSION["gender"]=$gender;
			    header('location:updatesuccessful.php');
	        	exit();

			} else {
			    echo "Error updating record: " . $conn->error;
			}

			$conn->close();
	    }
	?>
</body>
</html>