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
      if ($con->query("delete from useraccounts where id = '$_GET[id]'")) {
         header("location:mindex.php");
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
            <li class="nav-item active"> <a class="nav-link" href="maddnew.php">Add New Account</a></li>
            <li class="nav-item "> <a class="nav-link" href="mfeedback.php">Feedback</a></li>
            <li class="nav-item "> <a class="nav-link" href="mapplicationRequest.php">Application Requests</a></li>


         </ul>
         <?php include 'msideButton.php'; ?>

      </div>
   </nav><br><br><br>
   <?php
   if (isset($_POST['saveAccount'])) {


      if (!$con->query("INSERT into useraccounts (salutation,dateofbirth,gender,name,citizenship,accountNo,accountType,vdc_municipality,address,email,password,source,number,branch) SELECT salutation,dateofbirth,gender,firstname,citizenship,'$_POST[accountNo]',accountType,vdc_municipality,district,email,password,source,mobilenumber,'$_POST[branch]' from applyaccounts WHERE id ='$_GET[id]'")) {
         echo "<div claass='alert alert-success'>Failed. Error is:" . $con->error . "</div>";
      } else
         echo "<div class='alert alert-info text-center'>Account added Successfully</div>";
   }
   if (isset($_GET['del']) && !empty($_GET['del'])) {
      $con->query("delete from login where id ='$_GET[del]'");
   }


   ?>

   <?php

   $array = $con->query("select * from applyaccounts where id ='$_GET[id]'");
   $row = $array->fetch_assoc();

   ?>

   <div class="container">
      <div class="card w-100 text-center shadowBlack">
         <div class="card-header">
            <strong> New Account Form</strong>
         </div>
         <div class="card-body text-dark">
            <table class="table">
               <tbody>
                  <tr>
                     <form method="POST">
                        <th>Salutation</th>
                        <td><?php echo $row['salutation'] ?></td>
                        <th>Name</th>
                        <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
                              ?></td>

                  </tr>
                  <tr>
                     <th>Account Number</th>
                     <td><input type="" name="accountNo" readonly value="<?php echo time() ?>" class="form-control input-sm" required></td>
                     <th>Account Type</th>
                     <td><?php echo $row['accountType'] ?></td>
                  </tr>
                  <tr>
                     <th>Address</th>
                     <td><?php echo $row['district'] . ',' . $row['vdc_municipality']; ?></td>
                     <th>Ward Number</th>
                     <td><?php echo $row['wardno'] ?></td>
                  </tr>
                  <tr>
                     <th>Email</th>
                     <td><?php echo $row['email'] ?></td>
                     <th>Mobile Number</th>
                     <td><?php echo $row['mobilenumber'] ?></td>
                  </tr>
                  <tr>
                     <th>Balance</th>
                     <td>Rs. 0</td>
                     <th>Source of income</th>
                     <td><?php echo $row['source'] ?></td>
                  </tr>
                  <tr>
                     <th>Citizenship No</th>
                     <td><?php echo $row['citizenship'] ?></td>
                     <th>Branch</th>
                     <td>
                        <select name="branch" required class="form-control input-sm">
                           <option selected value="">Please Select..</option>
                           <?php
                           $arr = $con->query("select * from branch");
                           if ($arr->num_rows > 0) {
                              while ($row = $arr->fetch_assoc()) {
                                 echo "<option value='$row[branchId]'>$row[branchName]</option>";
                              }
                           } else
                              echo "<option value='1'>Main Branch</option>";
                           ?>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <button type="submit" name="saveAccount" class="btn btn-primary">Save Account</button>
                        <button type="button" class="btn  btn-warning " data-toggle="modal" data-target="#exampleModal" name="approveButton" title="Send Mail to Applicant">Send Mail </button>
                     </form>
                     </td>
                  </tr>
               </tbody>
            </table>


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
            <h5 class="modal-title" id="exampleModalLabel">Send Email to New User</h5>
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