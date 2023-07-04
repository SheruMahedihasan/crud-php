<?php

include 'mysqli.config.php';
$err_email = $err_name = $err_password = $err_phone = "";
if (isset($_POST['insert'])) {

	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	if ($name == "") {
		$err_name = "<span class='error'>Please enter your name.</span>";
	} elseif ($phone == "") {
		$err_phone = "<span class='error'>Please enter your phone.</span>";
	} elseif (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $phone)) {
		$err_phone == "<span class='error'> enter valid phone.</span>";
	} elseif ($email == "") {
		$err_email = "<span class='error'>Please enter your email</span>";
	} elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
		$err_email = "<span class='error'>Please enter valide email, like your@abc.com</span>";
	} elseif ($password == "") {
		$err_password =  "<span class='error'>Please enter password</span>";
	} else {

		$query = "INSERT INTO user_master(name,phone,email,password) Values ('$name','$phone','$email','$password')";
		$result = mysqli_query($con, $query);
		if ($result) {
			header("location:index.php");
		}
	}
}


mysqli_close($con);
?>
<?php

// $nameErr = $phoneerr = $passworderr = $emailErr = "";

// if ($_SERVER["REQUEST_METHOD"] == 'POST') {

// 	if (empty($_POST["name"])) {

// 		$nameErr = "Name is required";
// 	} else {
// 		$name = test_input($_POST["name"]);
// 		// check if name only contains letters and whitespace
// 		if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
// 			$nameErr = "Only letters and white space allowed";
// 		}
// 	}

// 	if (empty($_POST["phone"])) {
// 		$phoneerr = "Number is required";
// 	} else {
// 		$phone = test_input($_POST["phone"]);

// 		if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $phone)) {
// 			$phoneerr = "Enter Valid Number";
// 		}
// 	}

// 	if (empty($_POST["email"])) {
// 		$emailErr = "Email is required";
// 	} else {
// 		$email = test_input($_POST["email"]);
// 		// check if e-mail address is well-formed
// 		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// 			$emailErr = "Invalid email format";
// 		}	
// 	}

// 	if (empty($_POST["password"])) {
// 		$emailErr = "Email is required";
// 	} else {
// 		$email = test_input($_POST["email"]);
// 		// check if e-mail address is well-formed
// 		if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $password)) {
// 			$passworderr = "Enter Strong Password";
// 		}
// 	}
// }


// function test_input($data)
// {
// 	$data = trim($data);
// 	$data = stripslashes($data);
// 	$data = htmlspecialchars($data);
// 	return $data;
// }

?>
<html>

<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<style>
		.error {
			color: red;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row m-auto p-4 mt-4">
			<div class="col-ml-6  offset-m-4">


				<form class="p-3  bg-light-subtle" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class=" header text-center">
						<h1>Add User</h1>
					</div>

					<br>
					<div class="form-group">
						<label class="form-label">Name</label>
						<input type="text" name="name" class="form-control" value="<?php if (isset($_REQUEST['name']) && $_REQUEST['name'] != '') {
																						echo $_REQUEST['name'];
																					} ?>"><br>
						<?php echo $err_name; ?>
					</div>
					<div class="form-group">
						<label class="form-label">Phone</label>
						<input type="number" name="phone" class="form-control" value="<?php if (isset($_REQUEST['phone']) && $_REQUEST['phone'] != "") {
																							echo $_REQUEST['phone'];
																						}  ?>"><br>
						<?php echo $err_phone; ?>
					</div>

					<div class="form-group">
						<label class="form-label">Email</label>
						<input type="email" name="email" class="form-control" value="<?php if (isset($_REQUEST['email']) && $_REQUEST['email'] != "") {
																							echo $_REQUEST['email'];
																						} ?>"><br>
						<?php echo $err_email; ?>

					</div>
					<div class="form-group">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" value="<?php if (isset($_REQUEST['password']) && $_REQUEST['password'] != "") {
																								echo $_REQUEST['password'];
																							} ?>"><br>
						<?php echo $err_password; ?>

					</div>

					<div class="py-3 m-auto text-center">
						<button type="submit" name="insert" value="123" class="btn btn-success w-100">Insert</button>
						<div class="py-3 m-auto text-center">
							<button class="btn btn-success"><a href="display.php" class="text-light ">Display</a></button>
							<button class="btn btn-success"><a href="index.php" class="text-light ">Back To Home</a></button>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
</body>

</html>