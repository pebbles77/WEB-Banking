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
    //salt and hash password
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (!$con->query("insert into useraccounts (salutation,name,citizenship,accountNo,accountType,vdc_municipality,address,
    dateofbirth,gender,email,password,balance,source,number,branch) values ('$_POST[salutation]','$_POST[name]','$_POST[citizenship]','$_POST[accountNo]','$_POST[accountType]','$_POST[vdc_municipality]','$_POST[address]','$_POST[dateofbirth]','$_POST[gender]','$_POST[email]','$hashed_password','$_POST[balance]','$_POST[source]','$_POST[number]','$_POST[branch]')")) {
      echo "<div claass='alert alert-success'>Failed. Error is:" . $con->error . "</div>";
    } else
      echo "<div class='alert alert-info text-center'>Account created Successfully</div>";
  }
  if (isset($_GET['del']) && !empty($_GET['del'])) {
    $con->query("delete from login where id ='$_GET[del]'");
  }


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
                <td> <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MR" checked>&nbsp;MR
                     </label>
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MISS">&nbsp;MISS
                     </label>
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MRS">&nbsp;MRS
                     </label></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" class="form-control input-sm" required></td>
                <th>Citizenship No</th>
                <td><input type="number" name="citizenship" class="form-control input-sm" required></td>
            </tr>
            <tr>
              <th>Account Number</th>
              <td><input type="" name="accountNo" readonly value="<?php echo time() ?>" class="form-control input-sm" required></td>
              <th>Account Type</th>
              <td>
                <select class="form-control input-sm" name="accountType" required>
                  <option value="current" selected>Current</option>
                  <option value="saving" selected>Saving</option>
                </select>
              </td>
            </tr>
            <tr>
              <th>City</th>
              <td><input type="text" name="vdc_municipality" class="form-control input-sm" required></td>
              <th>District</th>
              <td><input type="text" name="address" class="form-control input-sm" required></td>
            </tr>
            <tr>
              <th>Date of Birth</th>
              <td><input type="date" class="form-control" id="inputDOB" name="dateofbirth" pattern="[1-2]{1}[0-9]{3}-[0-1]{1}[1-9]{1}-[0-9]{2}" placeholder="1976-10-21" required></td>
              <th>Gender</th>
              <td><select class="form-select form-select-md p-2 btn btn-block border" name="gender" aria-label=".form-select-md example">
                        <option selected>Please select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                     </select></td>
            </tr>
            <tr>
              <th>Email</th>
              <td><input type="email" name="email" class="form-control input-sm" required></td>
              <th>Password</th>
              <td><input type="password" name="password" class="form-control input-sm" required></td>
            </tr>
            <tr>
              <th>Deposit</th>
              <td><input type="number" name="balance" min="500" class="form-control input-sm" required></td>
              <th>Source of income</th>
              <td><input type="text" name="source" class="form-control input-sm" required></td>
            </tr>
            <tr>
              <th>Contact Number</th>
              <td><input type="number" name="number" class="form-control input-sm" required></td>
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
                <button type="submit" name="saveAccount" class="btn btn-primary btn-sm">Save Account</button>
                <button type="Reset" class="btn btn-secondary btn-sm">Reset</button></form>
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
            <h5 class="modal-title" id="exampleModalLabel">New Cashier Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
              Enter Details
              <input class="form-control w-75 mx-auto" type="email" name="email" required placeholder="Email">
              <input class="form-control w-75 mx-auto" type="password" name="password" required placeholder="Password">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="saveAccount" class="btn btn-primary">Save Account</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>

</html>