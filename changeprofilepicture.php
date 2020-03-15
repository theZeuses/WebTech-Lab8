<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="changeprofilepictureStyle.css">
</head>
<body>

	<?php
		
		// Check if image file is a actual image or fake image
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$target_dir = "";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
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
					$sql = "UPDATE Users SET image='$target_file' WHERE username='$usrname'";

					if ($conn->query($sql) === TRUE) {
						$_SESSION["image"]=$target_file;
					    header('location:updatesuccessful.php');
			        	exit();

					} else {
					    echo "Error updating record: " . $conn->error;
					}

					$conn->close();
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
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
		    	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
					<fieldset>
					  	<legend><h2>Profile Picture</h2></legend>
					  	<img src="image.jpg">
					  	<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
					  	<br><div class="line"></div><br>
					  	<input type="submit" value="Submit">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">Copyright:2017</div>
</body>
</html>