<!DOCTYPE html>
<html>
<head>
  <title>Simple Registration Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Registration Form</h2>

<form method="post">
  First Name: <input type="text" name="fname" required><br><br>
  Last Name: <input type="text" name="lname" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  Mobile Number: <input type="tel" name="mobile" pattern="[0-9]{10}" required><br><br>
  Password: <input type="password" name="pass" required><br><br>
  Confirm Password: <input type="password" name="cpass" required><br><br>
  
	Gender: 	<select name="gender" required>
			<option value="">--Please choose an option--</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			</select><br><br>
	Address:<br>
	<textarea name="address" rows="4" cols="50" required></textarea><br><br>
	Submit	:<input type="Submit" Name="sb">

</form>
							
							<?php
$con = mysqli_connect('localhost', 'root', '', 'studentdata');

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['sb'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    if ($password != $cpass) {
        echo "Passwords do not match!";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO recorddata (fname, lname, email, mobile, password, gender, address)
              VALUES ('$fname', '$lname', '$email', '$mobile', '$hashed_password', '$gender', '$address')";

    $execute = mysqli_query($con, $query);

    if ($execute) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>



</body>
</html>


