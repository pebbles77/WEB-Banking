<?php
session_start();
if (!isset($_SESSION['userId'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>

</head>

<body style="margin-bottom: 60px;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
    <img src="images/logo1.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
      <!--  <i class="d-inline-block  fa fa-building fa-fw"></i> --><?php echo bankname; ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item "> <a class="nav-link" href="accounts.php">Account Details</a></li>
        <li class="nav-item "> <a class="nav-link" href="statements.php">Transaction History</a></li>
        <li class="nav-item "> <a class="nav-link" href="transfer.php">Transfer Funds</a></li>
      </ul>
      <?php include 'sideButton.php'; ?>

    </div>
  </nav><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron" style="padding: 20px;max-height: 241px">
          <h4 class="display-5 text-center">Welcome to WEB-Bank</h4>
        </div>
        
          <div class="row">
            <div class="col-md-4 col-lg-4">
              <div class="card shadowBlack text-center">
                <img class="card-img-top" src="images/money2.jpg" alt="Card image cap">
                <div class="card-body">
                <a href="" class="btn btn-outline-success btn-block" data-toggle="tooltip" title="Your current Account Balance">Acount Balance : Rs.<?php echo $userData['balance']; ?></a>  
                </div>
              </div>
            </div>


            <div class="col-md-4 col-lg-4">
              <div class="card shadowBlack ">
                <img class="card-img-top" src="images/phone2.jpg" alt="Card image cap">
                <div class="card-body">
                  <a href="notice.php" class="btn btn-outline-success btn-block">Check Notification</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-4">
              <div class="card shadowBlack ">
                <img class="card-img-top" src="images/contact1.jpg" alt="Card image cap">
                <div class="card-body">
                  <a href="feedback.php" class="btn btn-outline-success btn-block">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer fixed-bottom bg-dark text-light" style="height: 50px;">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        <h6> © 2021 Copyright:
          UTR Projects </h6>
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>

</html>