<?php
session_start();
if (!isset($_SESSION['managerId'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB-Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
      <img src="images/logo1.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
      <?php echo bankname; ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link " href="mindex.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item "> <a class="nav-link" href="maccounts.php">Accounts</a></li>
        <li class="nav-item "> <a class="nav-link" href="maddnew.php">Add New Account</a></li>
        <li class="nav-item "> <a class="nav-link" href="mfeedback.php">Feedback</a></li>
        <li class="nav-item active"> <a class="nav-link" href="mapplicationRequest.php">Application Requests</a></li>
      </ul>
      <?php include 'msideButton.php'; ?>
    </div>
  </nav><br><br><br>

</body>

</html>