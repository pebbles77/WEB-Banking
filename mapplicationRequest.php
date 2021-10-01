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
  <div class="container">
    <div class="card text-center shadowBlack">
      <div class="card-header">
        <strong>Application Requests from Customer</strong>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm text-dark">
            <thead class="alert-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Salutation</th>
                <th scope="col">Name</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Gender</th>
                <th scope="col">Citizenship Number</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">District</th>
                <th scope="col">VDC/Municipality</th>
                <th scope="col">Ward No</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              $array = $con->query("select * from applyaccounts");
              if ($array->num_rows > 0) {
                while ($row = $array->fetch_assoc()) {
                  $i++;
              ?>
                  <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row['salutation'] ?></td>
                    <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] ?></td>
                    <td><?php echo $row['dateofbirth'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['citizenship'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['mobilenumber'] ?></td>
                    <td><?php echo $row['district'] ?></td>
                    <td><?php echo $row['vdc_municipality'] ?></td>
                    <td><?php echo $row['wardno'] ?></td>
                    <td>
                    <a href="verification.php?id=<?php echo $row['id'] ?>" class='btn alert-success btn-outline-success btn-sm' data-toggle='tooltip' title="View More info">View</a>
                    </td>
                    <!-- <td>
                    <a href="mapplicationRequest.php?delete=<?php echo $row['id'] ?>" class='btn alert-danger btn-outline-danger btn-sm' data-toggle='tooltip' title="Archive this user data">Archive</a>
                    </td> -->
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
  </div>

</body>

</html>