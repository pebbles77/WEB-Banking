<?php
session_start();
if (!isset($_SESSION['managerId'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>WEB-Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php if (isset($_GET['delete'])) {
    if ($con->query("delete from feedback where feedbackId = '$_GET[delete]'")) {
      header("location:mfeedback.php");
    }
  } ?>
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
        <li class="nav-item active"> <a class="nav-link" href="mfeedback.php">Feedback</a></li>
        <li class="nav-item "> <a class="nav-link" href="mapplicationRequest.php">Application Requests</a></li>
        <!-- <li class="nav-item ">  <a class="nav-link" href="transfer.php">Funds Transfer</a></li> -->
        <!-- <li class="nav-item ">  <a class="nav-link" href="profile.php">Profile</a></li> -->


      </ul>
      <?php include 'msideButton.php'; ?>

    </div>
  </nav><br><br><br>
  <div class="container">
    <div class="card w-100 text-center shadowBlack">
      <div class="card-header">
        <strong>Feedback from Customer</strong>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-sm text-dark">
          <thead>
            <tr>
              <th scope="col">From</th>
              <th scope="col">Account No.</th>
              <th scope="col">Contact</th>
              <th scope="col">Message</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            $array = $con->query("select * from useraccounts,feedback where useraccounts.id = feedback.userId");
            if ($array->num_rows > 0) {
              while ($row = $array->fetch_assoc()) {
            ?>
                <tr>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['accountNo'] ?></td>
                  <td><?php echo $row['number'] ?></td>
                  <td><?php echo $row['message'] ?></td>
                  <td>
                    <a href="mfeedback.php?delete=<?php echo $row['feedbackId'] ?>" class='btn alert-danger btn-outline-danger btn-sm' data-toggle='tooltip' title="Delete this Message">Delete</a>
                  </td>

                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
        <div class="card-footer text-muted">
          <?php echo bankname; ?>
        </div>
      </div>
      </div>
      </div> 
</body>

</html>