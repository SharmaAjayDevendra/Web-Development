<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php
	$errormessage="";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$pincode=$_POST['pincode'];
		$password=$_POST['password'];
		$isError=false;


		$emailregex="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

		$passregex="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";


		if(trim($username)=="" || trim($email)=="" || trim($contact)=="" || trim($pincode)=="" || trim($password)==""){
			$errormessage="All Fields are Compulsory";
			$isError=true;
		}
		elseif(strlen($contact)!=10 || !is_numeric($contact)){
			$errormessage="Invalid Contact Number";
			$isError=true;
		}
		elseif(strlen($pincode)!=6 || !is_numeric($pincode) || $pincode[0]=="0"){
			$errormessage="Invalid Pin Code";
			$isError=true;
		}elseif(!preg_match($emailregex, $email)){
			$errormessage="Invalid Email Address";
			$isError=true;
		}elseif(!preg_match($passregex, $password)){
			$errormessage="Weak Password";
			$isError=true;
		}

		if(!$isError){
			//database insert code
		}
	}
?>
<body>
	<?php echo "<h4>".$errormessage."</h4>"; ?>
	<form method="post" action="index.php">
		<label>Enter Name:</label><br>
		<input type="text" name="username"><br>
		<label>Enter Email:</label><br>
		<input type="text" name="email" ><br>
		<label>Enter Contact No:</label><br>
		<input type="text" name="contact" ><br>
		<label>Enter Pin Code:</label><br>
		<input type="text" name="pincode" ><br>
		<label>Enter Password:</label><br>
		<input type="password" name="password" ><br><br>
		<button>Submit</button>
	</form>
</body>
</html>
