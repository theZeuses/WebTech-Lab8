<?php
	session_start();	
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
		$usrname="";$pass="";
	  	$usernameErr=$passErr="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$val=TRUE;
	      	if (empty($_POST["pass"])) {
		        $passErr = "Password is required";
		        $val=FALSE;
	        }
	       else {
	        	$pass= test_input($_POST["pass"]);       
	        }

	        if (empty($_POST["usrname"])) {
	        	$usernameErr = "User Name is required";
	        	$val=FALSE;
	      	} else {
	          	$usrname = test_input($_POST["usrname"]);
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

		    $sql = "SELECT * FROM Users WHERE username='$usrname' and password='$pass'";
		    $result = $conn->query($sql);

		    if ($conn->query($sql) == TRUE && $result->num_rows > 0) {
		        // output data of each row
		        while($row = $result->fetch_assoc()) {
		            $_SESSION["name"] = $row["name"];
		            $_SESSION["username"] = $row["username"];
		            $_SESSION["email"] = $row["email"];
		            $_SESSION["dob"]=$row["dob"];
		            $_SESSION["gender"] = $row["gender"];
		            $_SESSION["password"] = $row["password"];
		            $_SESSION["image"] = $row["image"];
		        }
		        header('location:dashboard.php');
		        exit();
		    } else {
		        $usernameErr="Invalid Credentials";
		        $passErr="Invalid Credentials";
		    }
		    $conn->close();    
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
		    <p>User Name:<input type="text" name="usrname" value=""><span class="error">* <?php echo $usernameErr;?></span></p>
		    <p>Password  :<input type="password"  name="pass" value=""><span class="error">* <?php echo $passErr;?></span></p>
		    <div class="line"></div><br>
		    <input type="checkbox" name=rememberme value="yes">Remember Me<br>
		    <input type="submit" value="Submit"><a href="#">Forget Password?</a>
		  </fieldset>
		</form>
	</div>
	<div class="footer">Copyright:2017</div>

</body>
</html>