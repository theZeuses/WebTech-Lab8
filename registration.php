<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="registrationStyle.css">
</head>
<body>
	<?php
	    $name="";$gender="male";$email="";$username="";$password=$confirmpassword=$dob="";$nameErr=$emailErr=$usernameErr=$passErr=$conpassErr=$dobErr="";$val=FALSE;
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	        $val=TRUE;
	        if (empty($_POST["name"])) {
		        $nameErr = "Name is required";
		        $val=FALSE;
	        } else {
	            $name = test_input($_POST["name"]);
	        }
	        if (empty($_POST["username"])) {
		        $usernameErr = "User Name is required";
		        $val=FALSE;
	        } else {
	           $username = test_input($_POST["username"]);
	       }
	       if (empty($_POST["password"])) {
	            $passErr = "Password is required";
	        	$val=FALSE;
	        } else {
	            $password = test_input($_POST["password"]);
	        }
	        if (empty($_POST["confirmpassword"])) {
		        $conpassErr = "This is required";
		        $val=FALSE;
	        } else {
	            $confirmpassword = test_input($_POST["confirmpassword"]);
	        }
	        if($password!=$confirmpassword){
		        $conpassErr = "Password does not match.";
		        $val=FALSE;
	        }
	        else {
	          	$confirmpassword = test_input($_POST["confirmpassword"]);
	       }
	       if (empty($_POST["date"])) {
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
		<div class="topnav">
			<a href="registration.php">Registration</a>
			<a href="login.php">Log In</a>
			<a href="home_.php">Home</a>
		</div>
	</div>
	<div class="content">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			 <fieldset>
				  <legend><h2>REGISTRATION</h2></legend>
				  <label for="name">Name:</label>
				  <input type="text" id="name" name="name"><span class="error">* <?php echo $nameErr;?></span><br><br>
				  <div class="line"></div><br>
				  <label for="email">Email:</label>
				  <input type="email" id="email" name="email"><span class="error">* <?php echo $emailErr;?></span><br><br>
				  <div class="line"></div><br>
				  <label for="UserName">UserName:</label>
				  <input type="text" id="username" name="username"><span class="error">* <?php echo $usernameErr;?></span><br><br>
				  <div class="line"></div><br>
				  <label for="password">Password:</label>
				  <input type="password" id="password" name="password"><span class="error">* <?php echo $passErr;?></span><br><br>
				  <div class="line"></div><br><br>
				  <label for="confirmpassword">Confirm Password:</label>
				  <input type="password" id="Confirmpassword" name="confirmpassword"><span class="error">* <?php echo $conpassErr;?></span><br><br>
				  <div class="line"></div><br>
				  <fieldset>
				  	<legend>Gender</legend>
				  	  <input type="radio" id="male" name="gender" value="male" <?php if($gender=="male") echo 'checked'; ?>>
					  <label for="male">Male</label>
					  <input type="radio" id="female" name="gender" value="female" <?php if($gender=="female") echo 'checked'; ?>>
					  <label for="female">Female</label>
					  <input type="radio" id="other" name="gender" value="other" <?php if($gender=="Other") echo 'checked'; ?>>
					  <label for="other">Other</label>
				  </fieldset>
				    <fieldset>
				  	<legend>Date of Birth</legend>
				  	  <input type="date" name="dob" value=""><span class="error">* <?php echo $dobErr;?></span>
				  </fieldset>
				  <br><input type="submit" value="Submit">
				  <input type="submit" value="Reset">
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

		    $sql = "INSERT INTO MyGuests (name, username, email,password,gender,dob)
		    VALUES ($name, $username, $email,$password,$gender,$dob)";

		    if ($conn->query($sql) === TRUE) {
		        echo "New record created successfully";
		        header('location:login.php');
		        exit();
		    } else {
		        echo "Error: " . $sql . "<br>" . $conn->error;
		    }

		    $conn->close();
	    }
	?>
</body>
</html>