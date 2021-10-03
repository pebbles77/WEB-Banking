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
   </nav><br><br><br> <br> <br>
   <?php
   $array = $con->query("select * from applyaccounts where id ='$_GET[id]'");
   $row = $array->fetch_assoc();
   ?>
   <div class="container">
      <div class="card w-100 text-center shadowBlack">
         <div class="card-header alert-success">
            <strong> Application Form of <?php echo "<kbd>#";
                                          echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
                                          echo "</kbd>"; ?></strong>
         </div>
         <div class="card-body">
            <table class="table table-bordered">
               <tbody>
                  <tr>
                     <td>Name</td>
                     <th><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] ?></th>
                     <td>Date of Birth</td>
                     <th><?php echo $row['dateofbirth'] ?></th>
                  </tr>
                  <tr>
                     <td>Gender</td>
                     <th><?php echo $row['gender'] ?></th>
                     <td>Citizenship No</td>
                     <th><?php echo $row['citizenship'] ?></th>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <th><?php echo $row['email'] ?></th>
                     <td>Mobile Number</td>
                     <th><?php echo $row['mobilenumber'] ?></th>
                  </tr>
                  <tr>
                     <td>Address</td>
                     <th><?php echo $row['vdc_municipality'].','.$row['district'] ?></th>
                     <td>Ward Number</td>
                     <th><?php echo $row['wardno'] ?></th>
                  </tr>
                  
               </tbody>
            </table>
            <!-- <a href="maddnew.php" class="btn alert-warning btn-outline-warning btn-block" title="Approve this Form">Approve</a> -->
            <button type="button"class="btn alert-warning btn-outline-warning btn-block" data-toggle="modal" data-target="#exampleModal" title="Approve this Form">Approve</button>
            <a href="mapplicationRequest.php" class="btn alert-secondary btn-outline-secondary btn-block" title="Back to application requests page">Go Back</a>
         </div>
         <div class="card-footer text-muted">
            <?php echo bankname; ?>
         </div>
      </div>

      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Email to Applicant</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="mail_testing.php">
            <input class="form-control w-75 mx-auto" type="name" name="name" required placeholder="Applicant's Name">
              <input class="form-control w-75 mx-auto" type="email" name="email" required placeholder="Applicant's Email">
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="sendMail" class="btn btn-primary">Send Mail</button>
            </form>
          </div>
        </div>
      </div>
    </div>

</body>

</html>