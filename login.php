<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
	<?php
  		$val=FALSE;
		$username="";$pass="";
	  	$usernameErr=$passErr="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$val=TRUE;
	      	if (empty($_POST["password"])) {
		        $passErr = "Password is required";
		        $val=FALSE;
	        }
	       else {
	        	$pass= test_input($_POST["password"]);       
	        }

	        if (empty($_POST["username"])) {
	        	$usernameErr = "User Name is required";
	        	$val=FALSE;
	      	} else {
	          	$username = test_input($_POST["username"]);
	      	}
	      
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
		<div class="topnav">
			<a href="registration.php">Registration</a>
			<a href="login.php">Log In</a>
			<a href="home_.php">Home</a>
		</div>
	</div>
	<div class="content">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <fieldset>
		    <legend><h2>Log In</h2></legend>
		    <p>User Name:<input type="text" name="username" value=""><span class="error">* <?php echo $usernameErr;?></span></p>
		    <p>Password  :<input type="password"  name="password" value=""><span class="error">* <?php echo $passErr;?></span></p>
		    <div class="line"></div><br>
		    <input type="checkbox" name=rememberme value="yes">Remember Me<br>
		    <input type="submit" value="Submit"><a href="#">Forget Password?</a>
		  </fieldset>
		</form>
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

		    $sql = "SELECT * FROM MyUsers WHERE username='$username' and password='$pass'";
		    $result = $conn->query($sql);

		    if ($result->num_rows > 0) {
		        // output data of each row
		        while($row = $result->fetch_assoc()) {
		            $_SESSION["nam"] = $row["name"];
		            $_SESSION["em"] = $row["email"];
		            $_SESSION["dob"]=$row["dob"];
		            $_SESSION["gen"] = $row["gender"];
		            $_SESSION["pas"] = $row["password"];
		            $_SESSION["pic"] = $row["images"];
		        }
		        header('location:dashboard.php');
		        exit();
		    } else {
		        echo "\n\nInvalid Credentials.";
		    }
		    $conn->close();    
		}
	?>
</body>
</html>