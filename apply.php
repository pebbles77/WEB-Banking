<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Apply for new account</title>
   <?php require 'assets/autoloader.php'; ?>
   <?php require 'assets/function.php'; ?>
   <?php
   $con = new mysqli('localhost', 'root', '', 'web-bank');
   define('bankName', 'WEB-BANK', true);
   $error = "";

   $select = mysqli_query($con, "SELECT email FROM applyaccounts WHERE email = '".$_POST['email']."'") or exit(mysqli_error($con));

   if (isset($_POST['registerButton'])) {

        //salt and hash password
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);


      //Check if email is already being used or not!
      if(mysqli_num_rows($select)) {
         echo "<div class='alert alert-primary text-center'>This email is already being used</div>";
         
     }
     //check if password matches or not
     elseif ($_POST['password'] !== $_POST['password2']) {
         echo "<div class='alert alert-primary text-center'>Passwords do not match. Please type carefully!</div>";   
      }
      //check if connection is established or not
     elseif(!$con->query("insert into applyaccounts (accountType,salutation,firstname,middlename,lastname,dateofbirth,gender,citizenship,email,mobilenumber,district,vdc_municipality,wardno,password,source) values ('$_POST[accountType]','$_POST[salutation]','$_POST[firstname]','$_POST[middlename]','$_POST[lastname]','$_POST[dateofbirth]','$_POST[gender]','$_POST[citizenship]','$_POST[email]','$_POST[phone]','$_POST[district]','$_POST[vdc_municipality]','$_POST[ward]','$hashed_password','$_POST[source]')")) {

         echo "<div class='alert alert-light'>Failed. Error is:" . $con->error . "</div>";
      } else {          

         echo "<div class='alert alert-primary text-center'>Application Form submitted successfully</div>";
      }
   }




   ?>

</head>

<body style="background:black; margin-bottom: 60px;">
   <h2 class="alert alert-success rounded-0"><?php echo bankname; ?><small class="float-right text-muted" style="font-size: 12pt;"></small></h2>
   <br>
   <!-- navbar starts here -->
   <!-- <nav class="navbar fixed-top navbar-light bg-secondary">
      <div class="container-fluid">
         <a class="navbar-brand text-light" href="#">WEB-Bank</a>
      </div>
   </nav> -->
   <!-- navbar ends here -->

   <!-- main part starts here -->
   <div class="container">
      <div class="card text-center mx-auto shadowWhite" style="max-width: 50rem;">
         <div class="card-body">
            <form action="" method="POST">
               <div class="form-group">
                  <div class="text-left">
                     <br>
                     <strong>Account Type *</strong> &nbsp; &nbsp; &nbsp;
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="accountType" value="saving" checked>&nbsp;Saving
                     </label>
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="accountType" value="current">&nbsp;Current
                     </label>
                     <hr>
                     <strong>Salutation *</strong> &nbsp; &nbsp; &nbsp;
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MR" checked>&nbsp;MR
                     </label>
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MISS">&nbsp;MISS
                     </label>
                     <label class="radio radio-inline mr-4">
                        <input type="radio" name="salutation" value="MRS">&nbsp;MRS
                     </label>
                     <hr>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <label for="inputFirstName" class="form-label mt-2"> <strong> First Name *</strong></label>
                     <input name="firstname" class="form-control" id="inputFirstName" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputMiddleName" class="form-label mt-2"><strong> Middle Name </strong></label>
                     <input name="middlename" class="form-control" id="inputMiddleName">
                  </div>
                  <div class="col-md-4">
                     <label for="inputLastName" class="form-label mt-2"><strong> Last Name *</strong></label>
                     <input name="lastname" class="form-control" id="inputLastName" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputDOB" class="form-label mt-2"> <strong> Date of Birth *</strong></label>
                     <input type="date" class="form-control" id="inputDOB" name="dateofbirth" pattern="[1-2]{1}[0-9]{3}-[0-1]{1}[1-9]{1}-[0-9]{2}" placeholder="1976-10-21" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputGender" class="form-label mt-2"><strong> Gender *</strong></label> <br>
                     <select class="form-select form-select-md p-2 btn btn-block border" name="gender" aria-label=".form-select-md example">
                        <option selected>Choose</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                     </select>
                  </div>
                  <div class="col-md-4">
                     <label for="citizenship" class="form-label mt-2"><strong>Citizenship Number *</strong></label>
                     <input type="number" class="form-control" id="citizenship" name="citizenship" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputEmail" class="form-label mt-2"><strong>Email *</strong></label>
                     <input type="email" class="form-control" id="inputEmail" name="email" required>
                  </div>
                  <div class="col-md-4">
                     <label for="phone" class="form-label mt-2"><strong> Mobile Number *</strong></label>
                     <input type="tel" class="form-control" id="phone" name="phone" pattern="+977[9]{1}[8]{1}[0-9]{8}" value="+977" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputSource" class="form-label mt-2"> <strong> Source of Income *</strong></label>
                     <input name="source" class="form-control" id="inputSource" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputDistrict" class="form-label mt-2"> <strong>District *</strong> </label>
                     <input type="text" name="district" class="form-control" id="inputDistrict" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputCity" class="form-label mt-2"> <strong>VDC/Municipality *</strong> </label>
                     <input type="text" name="vdc_municipality" class="form-control" id="inputCity" required>
                  </div>
                  <div class="col-md-4">
                     <label for="inputWard" class="form-label mt-2"> <strong>Ward *</strong></label>
                     <input type="text" name="ward" class="form-control" id="inputWard" required>
                  </div>
                  <div class="col-md-6">
                     <label for="inputPassword" class="form-label mt-2"> <strong>Enter Password *</strong> </label>
                     <input type="password" name="password" class="form-control" id="inputPassword" required>
                  </div>
                  <div class="col-md-6">
                     <label for="inputPassword2" class="form-label mt-2"> <strong>Confirm Password *</strong> </label>
                     <input type="password" name="password2" class="form-control" id="inputPassword2" required>
                  </div>
                  <div class="checkbox mt-4">
                     <label style="margin-left: 0;">
                        <input name="terms_conditions" type="checkbox" value="1" required>
                        I authorize WEB-Bank to send mail on the above mentioned Email.
                     </label>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary btn-block btn-sm my-1" name="registerButton">Apply
               </button>
               <a type="button" href="login.php" class="btn btn-secondary btn-block btn-sm">Cancel</a>
            </form>
         </div>
      </div>
   </div>

   <!-- main part ends here -->

   <!-- Footer -->
   <!-- <footer class="page-footer fixed-bottom bg-secondary text-light" style="height: 50px;"> -->
   <!-- Copyright -->
   <!-- <div class="footer-copyright text-center py-3">
         <h6> © 2021 Copyright:
            UTR Projects </h6>
      </div> -->
   <!-- Copyright -->

   <!-- </footer> -->
   <!-- Footer -->
</body>

</html>