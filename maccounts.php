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
        <li class="nav-item active"> <a class="nav-link" href="maccounts.php">Accounts</a></li>
        <li class="nav-item "> <a class="nav-link" href="maddnew.php">Add New Account</a></li>
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

    if (!$con->query("insert into login (email,password,type) values ('$_POST[email]','$hashed_password','$_POST[type]')")) {
      echo "<div claass='alert alert-success'>Failed. Error is:" . $con->error . "</div>";
    }else {          

      echo "<div class='alert alert-primary text-center'>New account created successfully</div>";
   }
  }
  if (isset($_GET['del']) && !empty($_GET['del'])) {
    $con->query("delete from login where id ='$_GET[del]'");
  }
  $array = $con->query("select * from login ");

  ?>
  <div class="container">
    <div class="card w-75 mx-auto text-center shadowBlack">
      <div class="card-header">
        <strong>All Staff Accounts</strong> <button class="btn  alert-success btn-outline-success btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Add New Account</button>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Email</th>
              <th>Account Type</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($array->num_rows > 0) {
              while ($row = $array->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td><a href='maccounts.php?del=$row[id]' class='btn alert-danger btn-outline-danger btn-sm'>Delete</a></td>";
                echo "</tr>";
              }
            }
            ?>
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
            <h5 class="modal-title" id="exampleModalLabel">Create New Admin/Cashier Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
              Enter Details
              <input class="form-control w-75 mx-auto" type="email" name="email" required placeholder="Email">
              <input class="form-control w-75 mx-auto" type="password" name="password" required placeholder="Password">
              <select class="form-select w-75 mx-auto btn-block p-2" name="type" aria-label=".form-select-md example">
                        <option value="cashier" selected>Staff</option>
                        <option value="manager">Admin</option>
                     </select>
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