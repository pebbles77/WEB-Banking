<!DOCTYPE html>
<html>

<head>
	<title>WEB-Banking</title>
	<?php require 'assets/autoloader.php'; ?>
	<?php require 'assets/function.php'; ?>
	<?php
	$con = new mysqli('localhost', 'root', '', 'web-bank');
	define('bankName', 'WEB-BANK', true);

	$error = "";
	if (isset($_POST['userLogin'])) {
		$error = "";
		$user = $_POST['email'];
		$pass = $_POST['password'];

		$result = $con->query("select * from userAccounts where email='$user' AND password='$pass'");
		if ($result->num_rows > 0) {
			session_start();
			$data = $result->fetch_assoc();
			$_SESSION['userId'] = $data['id'];
			$_SESSION['user'] = $data;
			header('location:index.php');
		} else {
			$error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		}
	}
	if (isset($_POST['staffLogin'])) {
		$error = "";
		$user = $_POST['email'];
		$pass = $_POST['password'];

		$result = $con->query("select * from login where email='$user' AND password='$pass'");
		if ($result->num_rows > 0) {
			session_start();
			$data = $result->fetch_assoc();
			$_SESSION['cashId'] = $data['id'];
			//$_SESSION['user'] = $data;
			header('location:cindex.php');
		} else {
			$error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		}
	}
	if (isset($_POST['adminLogin'])) {
		$error = "";
		$user = $_POST['email'];
		$pass = $_POST['password'];

		$result = $con->query("select * from login where email='$user' AND password='$pass' AND type='manager'");
		if ($result->num_rows > 0) {
			session_start();
			$data = $result->fetch_assoc();
			$_SESSION['managerId'] = $data['id'];
			//$_SESSION['user'] = $data;
			header('location:mindex.php');
		} else {
			$error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
		}
	}

	?>
</head>

<body style="background: url(images/img1.jpg);background-size: 100%">
	<h2 class="alert alert-success rounded-0"><?php echo bankname; ?><small class="float-right text-muted" style="font-size: 12pt;"></small></h2>
	
	<?php echo $error ?>
	
	<div id="accordion" role="tablist" class="w-25 float-right shadowBlack" style="margin-right: 222px">
		<br>
		<h4 class="text-center text-white">Register</h4>
		<div class="card rounded-0">
			<div class="card-header" role="tab" id="headingFour">
				<h5 class="mb-0">
					<a style="text-decoration: none;" href="apply.php">
						<button class="btn btn-outline-success btn-block">Apply for New Account</button>
					</a>
				</h5>
			</div>
	</div>
	<br>
		<h4 class="text-center text-white">Login</h4>
		<div class="card rounded-0">
			<div class="card-header" role="tab" id="headingOne">
				<h5 class="mb-0">
					<a style="text-decoration: none;" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<button class="btn btn-outline-success btn-block">User Login</button>
					</a>
				</h5>
			</div>

			<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
				<div class="card-body">
					<form method="POST">
						<input type="email" name="email" class="form-control" required placeholder="Enter Email">
						<input type="password" name="password" class="form-control" required placeholder="Enter Password">
						<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="userLogin">Enter </button>
					</form>
				</div>
			</div>
		</div>
		<div class="card rounded-0">
			<div class="card-header" role="tab" id="headingTwo">
				<h5 class="mb-0">
					<a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						Admin Login
					</a>
				</h5>
			</div>
			<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
				<div class="card-body">
					<form method="POST">
						<input type="email" name="email" class="form-control" required placeholder="Enter Email">
						<input type="password" name="password" class="form-control" required placeholder="Enter Password">
						<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="adminLogin">Enter </button>
					</form>
				</div>
			</div>
		</div>
		<div class="card rounded-0">
			<div class="card-header" role="tab" id="headingThree">
				<h5 class="mb-0">
					<a class="collapsed btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						Staff Login
					</a>
				</h5>
			</div>
			<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
				<div class="card-body">
					<form method="POST">
						<input type="email" name="email" class="form-control" required placeholder="Enter Email">
						<input type="password" name="password" class="form-control" required placeholder="Enter Password">
						<button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="staffLogin">Enter </button>
					</form>
				</div>
			</div>
		</div>
</body>

</html>