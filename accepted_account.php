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
            <li class="nav-item "> <a class="nav-link" href="mapplicationRequest.php">Application Requests</a></li>
         </ul>
         <?php include 'msideButton.php'; ?>
      </div>
   </nav><br><br><br>

   <div class="container py-3">
   <div class="row">
   <div class="col-md-12"> 
   <div class="row justify-content-center">
   <div class="col-md-6">
   <div class="card card-outline-secondary">
   <div class="card-header">
   <h3 class="mb-0">Send Mail to Applicant</h3>
   </div>
   <div class="card-body">
   <form autocomplete="off" class="form" role="form" method="post" action="mail_testing.php">
   <div class="form-group row">
   <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
   <div class="col-lg-9">
      <input class="form-control" type="text" value="" placeholder="Enter Full name" name="full_name" required>
   </div>
   </div>
   <div class="form-group row">
   <label class="col-lg-3 col-form-label form-control-label">Mobile No.</label>
   <div class="col-lg-9">
      <input class="form-control" type="text" value="" placeholder="Enter Mobile Number" name="mobile_number" required>
   </div>
   </div>
   <div class="form-group row">
   <label class="col-lg-3 col-form-label form-control-label">Email</label>
   <div class="col-lg-9">
      <input class="form-control" type="email" value=""  placeholder="Enter Email" name="email" required>
   </div>
   </div>
   <div class="form-group row">
   <label class="col-lg-3 col-form-label form-control-label">Message</label>
   <div class="col-lg-9">
      <textarea class="form-control"  placeholder="Write your message" name="message" required></textarea>
   </div>
   </div>
   <div class="form-group row">
   <label class="col-lg-3 col-form-label form-control-label"></label>
   <div class="col-lg-9">
      <input class="btn btn-primary" type="submit" name="btnsubmit" value="Send">
   </div>
   </div>

   </form>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>







   </body>

</html>
<!-- Insert user details from applyaccounts to useraccounts database-->
<!-- send mail to user emailid along with password with resetting option -->
<!-- give account number to user along with a/c type, branch and so on-->